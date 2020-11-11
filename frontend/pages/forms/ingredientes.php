<?php

require('base.php');

$nomeDaTabela = 'ingredientes';
$nomeCrud = 'Ingredientes';
$valorInputs = [
  [
    'campo'      => 'nome_ingredientes', 
    'tipo'       => 'string', 
    'titulo'     => 'Nome',
    'visualizar' => true
  ]
];
$relacionamentos = [];

new Base($nomeDaTabela, $nomeCrud, $valorInputs, $relacionamentos);