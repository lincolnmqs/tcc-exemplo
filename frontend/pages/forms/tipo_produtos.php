<?php

require('base.php');

$nomeDaTabela = 'tipo_produtos';
$nomeCrud = 'Tipo Produtos';
$valorInputs = [
  [
    'campo'      => 'nome_tipo_produtos', 
    'tipo'       => 'string', 
    'titulo'     => 'Nome',
    'visualizar' => true
  ]
];

new Base($nomeDaTabela, $nomeCrud, $valorInputs);