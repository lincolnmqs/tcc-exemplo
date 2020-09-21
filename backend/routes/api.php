<?php

namespace App\Routes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

///////////////////////////// ALTERAR SOMENTE O CONTEÚDO A BAIXO ////////////////////////////////

// Para criar uma nova rota, é necessário acrescentar no array abaixo o nome referente a tabela.

new Rotas([
    // 'nome_da_tabela', 
    'avaliadores', 
    'pessoas'
]);

///////////////////////////// ALTERAR SOMENTE O CONTEÚDO A CIMA ////////////////////////////////

class Rotas {
    public function __construct($rotas){
        $this->rotas = $rotas;
        $this->count = count($this->rotas);

        for($this->i=0; $this->i<$this->count; $this->i++){  
            $this->controller = $this->rotas[$this->i];
            $this->controller[0] = strtoupper($this->controller[0]);
            
            Route::namespace('App\Http\Controllers\Api')->group(function(){
                Route::prefix($this->rotas[$this->i])->group(function(){
                    Route::get('/', $this->controller.'Controller@index');
                    Route::get('/{id_'.$this->rotas[$this->i].'}', $this->controller.'Controller@show');

                    Route::post('/', $this->controller.'Controller@store');

                    Route::put('/{id_'.$this->rotas[$this->i].'}', $this->controller.'Controller@update');

                    Route::delete('/{id_'.$this->rotas[$this->i].'}', $this->controller.'Controller@delete');
                });
            });
        }
	}
}