<?php

require('base.php');

$nomeDaTabela = 'pessoas';
$nomeCrud = 'Pessoas';
$camposInputs = [
  [
    'campo'      => 'cpf_pessoas', 
    'tipo'       => 'string', 
    'titulo'     => 'CPF',
    'visualizar' => true
  ],
  [
    'campo'      => 'senha_pessoas', 
    'tipo'       => 'password', 
    'titulo'     => 'Senha',
    'visualizar' => false
  ]
];

$frontend = new Base($nomeDaTabela, $nomeCrud, $camposInputs);