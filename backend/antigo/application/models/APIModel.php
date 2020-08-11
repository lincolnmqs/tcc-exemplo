<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . '../system/core/Model.php');

class APIModel extends CI_Model {

    var $client_service = "frontend-client";
    var $auth_key       = "simplerestapi";

    public function __construct($nomeDaTabela, $valorGet){
       parent::__construct();

       $this->nomeDaTabela = $nomeDaTabela;
       $this->valorGet = $valorGet;
    }

    public function check_auth_client(){
        $client_service = $this->input->get_request_header('Client-Service', TRUE);
        $auth_key  = $this->input->get_request_header('Auth-Key', TRUE);

        /*
        if($client_service == $this->client_service && $auth_key == $this->auth_key){
            return true;
        } else {
            return json_output(401,array('status' => 401,'message' => 'Unauthorized.'));
        }*/

        return true;
    }

    public function login($username, $password){
        $q  = $this->db->select('password,id')->from('users')->where('username',$username)->get()->row();
       
        if($q == ""){
            return array('status' => 204,'message' => 'Username not found.');
        } else {
            $hashed_password = $q->password;
            $id              = $q->id;
             echo $hashed_password ." ".$password;
        //exit;
            if (hash_equals($hashed_password, crypt($password, $hashed_password))) {
               $last_login = date('Y-m-d H:i:s');
               $token = crypt(substr( md5(rand()), 0, 7));
               $expired_at = date("Y-m-d H:i:s", strtotime('+12 hours'));
               $this->db->trans_start();
               $this->db->where('id',$id)->update('users',array('last_login' => $last_login));
               $this->db->insert('users_authentication',array('users_id' => $id,'token' => $token,'expired_at' => $expired_at));
               if ($this->db->trans_status() === FALSE){
                  $this->db->trans_rollback();
                  return array('status' => 500,'message' => 'Internal server error.');
               } else {
                  $this->db->trans_commit();
                  return array('status' => 200,'message' => 'Successfully login.','id' => $id, 'token' => $token);
               }
            } else {
                echo "Wrong password";
                exit();
               return array('status' => 204,'message' => 'Wrong password.');
            }
        }
    }

    public function logout(){
        $users_id  = $this->input->get_request_header('User-ID', TRUE);
        $token     = $this->input->get_request_header('Authorization', TRUE);
        $this->db->where('users_id',$users_id)->where('token',$token)->delete('users_authentication');
        return array('status' => 200,'message' => 'Successfully logout.');
    }

    public function auth(){
        $users_id  = $this->input->get_request_header('User-ID', TRUE);
        $token     = $this->input->get_request_header('Authorization', TRUE);
        $q  = $this->db->select('expired_at')->from('users_authentication')->where('users_id',$users_id)->where('token',$token)->get()->row();
        if($q == ""){
            return json_output(401,array('status' => 401,'message' => 'Unauthorized.'));
        } else {
            if($q->expired_at < date('Y-m-d H:i:s')){
                return json_output(401,array('status' => 401,'message' => 'Your session has been expired.'));
            } else {
                $updated_at = date('Y-m-d H:i:s');
                $expired_at = date("Y-m-d H:i:s", strtotime('+12 hours'));
                $this->db->where('users_id',$users_id)->where('token', $token)->update('users_authentication', array('expired_at' => $expired_at,'updated_at' => $updated_at));
                return array('status' => 200,'message' => 'Authorized.');
            }
        }
    }

    public function all_data(){
        return $this->db->select($this->valorGet)->from($this->nomeDaTabela)->order_by('id_' . $this->nomeDaTabela, 'desc')->get()->result();
    }

    public function detail_data($id){
        return $this->db->select($this->valorGet)->from($this->nomeDaTabela)->where('id_' . $this->nomeDaTabela, $id)->order_by('id_' . $this->nomeDaTabela, 'desc')->get()->row();
    }

    public function create_data($data){
        $this->db->insert($this->nomeDaTabela, $data);
        return array('status' => 201,'message' => 'Data has been created.');
    }

    public function update_data($id, $data){
        $this->db->where('id_' . $this->nomeDaTabela, $id)->update($this->nomeDaTabela, $data);
        return array('status' => 200,'message' => 'Data has been updated.');
    }

    public function delete_data($id){
        $this->db->where('id_' . $this->nomeDaTabela, $id)->delete($this->nomeDaTabela);
        return array('status' => 200,'message' => 'Data has been deleted.');
    }

}
