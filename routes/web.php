<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix'=>'maquinas'], function(){
    Route::get('/cadastro', 'MaquinaController@cadastro');
    Route::get('/lista', 'MaquinaController@maquina');
    Route::get('/alterar/{id_maq_fisica}', 'MaquinaController@alterar');
    Route::put('/alterada', 'MaquinaController@alterada');
    Route::post('/novocadastro', 'MaquinaController@novocadastro');
    Route::get('/deletar/{id_maq_fisica}', 'MaquinaController@deletar');

});

Route::group(['prefix'=>'dominios'], function() {
    Route::get('/lista', 'DominioController@dominio');
    Route::get('/alterar/{id_dominio}', 'DominioController@alterar');
    Route::put('/alterada', 'DominioController@alterada');
    Route::post('/novocadastro', 'DominioController@novocadastrodominio');
    Route::get('/deletar/{id_dominio}', 'DominioController@deletar');


});

Route::group(['prefix'=>'virtuais'], function() {
   // Route::get('/lista', 'VirtualController@lista');
    Route::get('/cadastro', 'VirtualController@cad_maq_virtual');
    Route::get('/alterar/{id_maq_virtual}', 'VirtualController@alterar');
    Route::put('/alterada', 'VirtualController@alterada');
    Route::get('/deletar/{id_maq_virtual}', 'VirtualController@deletarvirtual');
    Route::post('/salvar', 'VirtualController@salvar');
    Route::get('/cad-maq-virtual/{id_maq_fisica?}', 'VirtualController@cad_maq_virtual');
});

Route::group(['prefix'=>'virtualdominio'], function(){
    Route::get('/maquina/{id}', 'VirtualDominioController@vinculomaquina');
    Route::post('/salvar', 'VirtualDominioController@salvar');

});

Route::get('/inicial', 'MaquinaController@index');




Route::get('/', function () {
    return view('inicial');
});

\Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
    /*echo '<pre>';
        var_dump($query->sql).'<br>';
        var_dump($query->bindings).'<br>';
    echo '</pre>';*/
});
