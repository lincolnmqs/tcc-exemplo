<?php

require('base.php');

$frontend = new Base('avaliadores', 'Avaliadores', [
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
]);