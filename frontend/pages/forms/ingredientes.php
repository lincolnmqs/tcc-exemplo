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

new Base($nomeDaTabela, $nomeCrud, $valorInputs);