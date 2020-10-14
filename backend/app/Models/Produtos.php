<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 1) Para criar uma nova model, inicialmente é necessário alterar o nome da classe abaixo, 
//referente a tabela.

class Produtos extends Model {

    // 2) Em seguida, é necessário definir os campos da tabela:

    // nome da tabela
    protected $table = 'produtos';

    // chave primária
    protected $primaryKey = 'id_produtos'; // chave primária

    // outros campos
    protected $fillable = [
          'nome_produtos', 
          'preco_produtos'
    ];

    // tabelas relacionadas



    public $timestamps = false;

    public function relacionamento($tipo, $classe, $chaveEstrangeira, $chaveLocal){
        if($tipo == 'temUm') // (1-1)
            return $this->hasOne('App\Models'.$classe);

        else if($tipo == 'pertenceA') // (M-1, 1-1)
            return $this->belongsTo('App\Models'.$classe, $chaveEstrangeira, $chaveLocal);

        else if($tipo == 'temMuitos') // (1-M)
            return $this->hasMany('App\Models'.$classe);

        else if($tipo == 'muitosParaMuitos') // (M-M)
            return $this->belongsToMany('App\Models'.$classe);
    }

}
