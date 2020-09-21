<?php

require('base.php');

$nomeDaTabela = 'avaliadores';
$nomeCrud = 'Avaliadores';
$camposInputs = [
  [
    'campo'      => 'cpf_avaliadores', 
    'tipo'       => 'string', 
    'titulo'     => 'CPF',
    'visualizar' => true
  ], 
  [
    'campo'      => 'data_envio_avaliadores', 
    'tipo'       => 'date', 
    'titulo'     => 'Data de Envio',
    'visualizar' => true
  ], 
  [
    'campo'      => 'data_retorno_avaliadores', 
    'tipo'       => 'date', 
    'titulo'     => 'Data de Retorno',
    'visualizar' => true
  ]
];

$frontend = new Base($nomeDaTabela, $nomeCrud, $camposInputs);