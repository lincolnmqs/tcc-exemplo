<?php

require('base.php');

$camposInputs = [
  [
    'cpf_avaliadores', 
    'string', 
    'CPF'
  ], 
  [
    'data_envio_avaliadores', 
    'date', 
    'Data de Envio'
  ], 
  [
    'data_retorno_avaliadores', 
    'date', 
    'Data de Retorno'
  ]
];

$frontend = new Base('avaliadores', 'Avaliadores', $camposInputs); // nome da tabela, nome do crud, campos definidos do input