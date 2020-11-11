<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 1) Para criar uma nova model, é necessário alterar o nome da classe abaixo, referente a tabela

class Tipo_Produtos extends Model {

    public $timestamps = false;

    // 2) Em seguida, é necessário definir os campos da tabela

    // nome da tabela
    protected $table = 'tipo_produtos';

    // chave primária
    protected $primaryKey = 'id_tipo_produtos'; 

    // outros campos
    protected $fillable = [
        'nome_tipo_produtos'
    ];

}