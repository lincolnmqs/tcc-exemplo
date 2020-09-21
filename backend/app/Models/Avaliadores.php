<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

///////////////////////////// ALTERAR SOMENTE O CONTEÚDO A BAIXO ////////////////////////////////

// 1) Para criar uma nova model, inicialmente é necessário alterar o nome da classe abaixo, 
//referente a tabela.

class Avaliadores extends Model {

    // 2) Em seguida, é necessário definir os campos da tabela abaixo.

    protected $primaryKey = 'id_avaliadores'; // chave primária

    protected $fillable = [
          'cpf_avaliadores', 
          'data_envio_avaliadores', 
          'data_retorno_avaliadores'
    ];

    public $timestamps = false;

}
