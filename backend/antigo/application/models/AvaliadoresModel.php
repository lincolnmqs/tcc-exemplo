<?php

require('APIModel.php');

$apimodel = new APIModel('avaliadores', 'id_avaliadores,cpf_avaliadores,data_envio_avaliadores,data_retorno_avaliadores');

$apimodel->check_auth_client();
$apimodel->login();
$apimodel->logout();
$apimodel->auth();
$apimodel->all_data();
$apimodel->detail_data();
$apimodel->create_data();
$apimodel->update_data();
$apimodel->delete_data();