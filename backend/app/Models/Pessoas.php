<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

///////////////////////////// ALTERAR SOMENTE O CONTEÚDO A BAIXO ////////////////////////////////

// 1) Para criar uma nova model, inicialmente é necessário alterar o nome da classe abaixo, 
//referente a tabela.

class Pessoas extends Model {

    // 2) Em seguida, é necessário definir os campos da tabela abaixo.

    protected $primaryKey = 'id_pessoas'; // chave primária

    protected $fillable = [
          'cpf_pessoas', 
          'senha_pessoas'
    ];

    ///////////////////////// ALTERAR SOMENTE O CONTEÚDO A CIMA ////////////////////////////////

    public $timestamps = false;

    public function relacionamento($tipo, $classe, $chaveEstrangeira){
        if($tipo == 'temUm')
            return $this->hasOne('App\Models'.$classe, $chaveEstrangeira);

        else if($tipo == 'pertenceA')
            return $this->belongsTo('App\Models'.$classe, $chaveEstrangeira);

        else if($tipo == 'temMuitos')
            return $this->hasMany('App\Models'.$classe, $chaveEstrangeira);

        else if($tipo == 'muitosParaMuitos')
            return $this->belongsToMany('App\Models'.$classe, $chaveEstrangeira);
    }

}