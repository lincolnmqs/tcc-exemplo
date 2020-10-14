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

    // relacionamentos
    protected $with = ['ingredientes', 'produtos'];

    public $relacionamentos = [
        'ingredientes' => [
            'classe'           => Ingredientes::class,
            'chaveEstrangeira' => 'id_ingredientes',
            'chaveLocal'       => 'id_produtos',
            'tabelaGerada'     => 'produtos_ingredientes',
            'tipo'             => 'muitosParaMuitos'
        ],
       'produtos' => [
            'classe'           => Produtos::class,
            'chaveEstrangeira' => 'id_tipo_produtos',
            'chaveLocal'       => '',
            'tabelaGerada'     => '',
            'tipo'             => 'temMuitos'
        ]
    ];

    public function ingredientes(){
        return $this->relacionamento('ingredientes');
    }

    public function produtos(){
        return $this->relacionamento('produtos');
    }

    public function relacionamento($tabela){
        if($this->relacionamentos[$tabela]['tipo'] == 'temUm') // (1-1)
            return $this->hasOne($this->relacionamentos[$tabela]['classe']);

        else if($this->relacionamentos[$tabela]['tipo'] == 'pertenceA') // (M-1, 1-1)
            return $this->belongsTo($this->relacionamentos[$tabela]['classe'], $this->relacionamentos[$tabela]['chaveEstrangeira'], $this->relacionamentos[$tabela]['chaveLocal']);

        if($this->relacionamentos[$tabela]['tipo'] == 'temMuitos') // (1-M)
            return $this->hasMany($this->relacionamentos[$tabela]['classe'], $this->relacionamentos[$tabela]['chaveEstrangeira']);

        else if($this->relacionamentos[$tabela]['tipo'] == 'muitosParaMuitos') // (M-M)
            return $this->belongsToMany($this->relacionamentos[$tabela]['classe'], $this->relacionamentos[$tabela]['tabelaGerada'], $this->relacionamentos[$tabela]['chaveEstrangeira'], $this->relacionamentos[$tabela]['chaveLocal']);
    }
}