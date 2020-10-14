<?php

require('base.php');

$nomeDaTabela = 'produtos';
$nomeCrud = 'Produtos';
$valorInputs = [
  [
    'campo'      => 'nome_produtos', 
    'tipo'       => 'string', 
    'titulo'     => 'Nome',
    'visualizar' => true
  ], 
  [
    'campo'      => 'preco_produtos', 
    'tipo'       => 'number', 
    'titulo'     => 'Preço',
    'visualizar' => true
  ]
];

new Base($nomeDaTabela, $nomeCrud, $valorInputs);