<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 1) Para criar uma nova model, inicialmente é necessário alterar o nome da classe abaixo, 
//referente a tabela.

class Produtos extends Model {

    public $timestamps = false;

    // 2) Em seguida, é necessário definir os campos da tabela:

    // nome da tabela
    protected $table = 'produtos';

    // chave primária
    protected $primaryKey = 'id_produtos'; // chave primária

    // outros campos
    protected $fillable = [
          'nome_produtos', 
          'preco_produtos',
          'id_tipo_produtos'
    ];

    // relacionamentos
    protected $with = ['ingredientes', 'tipo_produtos'];

    public $relacionamentos = [
        'ingredientes' => [
            'classe'           => Ingredientes::class,
            'chaveEstrangeira' => 'id_produtos',
            'chaveLocal'       => 'id_ingredientes',
            'tabelaGerada'     => 'produtos_ingredientes',
            'tipo'             => 'muitosParaMuitos'
        ],
       'tipo_produtos' => [
            'classe'           => Tipo_Produtos::class,
            'chaveEstrangeira' => 'id_tipo_produtos',
            'chaveLocal'       => 'id_tipo_produtos',
            'tabelaGerada'     => '',
            'tipo'             => 'pertenceA'
        ]
    ];

    // se possuir relacionamentos muitos para muitos
    protected $hidden = ['pivot'];

    public function ingredientes(){
        return $this->relacionamento('ingredientes');
    }

    public function tipo_produtos(){
        return $this->relacionamento('tipo_produtos');
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
