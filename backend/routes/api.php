<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;

///////////////////////////// ALTERAR SOMENTE O CONTEÚDO A BAIXO ////////////////////////////////

// Para criar uma nova rota, é necessário acrescentar no array abaixo o nome referente a tabela.

new Rotas([
    // 'nome_da_tabela', 
    'produtos', 
    'tipo_produtos',
    'ingredientes',
    'pessoas'
]);

///////////////////////////// ALTERAR SOMENTE O CONTEÚDO A CIMA ////////////////////////////////

Route::post('auth/login', 'App\Http\Controllers\Api\AuthController@login');

Route::group([
    'middleware' => 'apiJwt',
    'prefix' => 'auth'
], function ($router) {
    Route::post('logout', 'App\Http\Controllers\Api\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\Api\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\Api\AuthController@me');
});

class Rotas {
    public function __construct($rotas){
        $this->rotas = $rotas;
        $this->count = count($this->rotas);

        Route::namespace('App\Http\Controllers\Api')->group([
            'middleware' => 'apiJwt'
        ], function(){

            for($this->i=0; $this->i<$this->count; $this->i++){  
                $this->controller = $this->rotas[$this->i];
                $this->controller[0] = strtoupper($this->controller[0]);
                
                Route::prefix($this->rotas[$this->i])->group(function(){
                    Route::get('/', $this->controller.'Controller@index');
                    Route::get('/{id_'.$this->rotas[$this->i].'}', $this->controller.'Controller@show');

                    Route::post('/', $this->controller.'Controller@store');

                    Route::put('/{id_'.$this->rotas[$this->i].'}', $this->controller.'Controller@update');

                    Route::delete('/{id_'.$this->rotas[$this->i].'}', $this->controller.'Controller@delete');
                });
            }

        });
	}
}