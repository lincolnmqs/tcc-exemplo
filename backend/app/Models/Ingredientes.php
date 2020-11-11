<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 1) Para criar uma nova model, inicialmente é necessário alterar o nome da classe abaixo, 
//referente a tabela.

class Ingredientes extends Model {

    public $timestamps = false;

    // 2) Em seguida, é necessário definir os campos da tabela abaixo:

    // nome da tabela
    protected $table = 'ingredientes';

    // chave primária
    protected $primaryKey = 'id_ingredientes'; // chave primária

    // outros campos
    protected $fillable = [
          'nome_ingredientes'
    ];

    // possui relacionamento muitos para muitos
    protected $hidden = ['pivot'];

}
