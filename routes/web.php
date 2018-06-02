<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function() {
   Route::get('/', function() { return view('admin.index'); });
   Route::resource('carros', 'CarroController');
   Route::resource('usuarios', 'UserController');
   Route::get('carrosgraf', 'CarroController@graf')
   ->name('carros.graf');
   Route::get('carrosdestaque/{id}', 'CarroController@destaque')
   ->name('carros.destaque');
   Route::resource('clientes', 'UUserController');
});

//Route::get('/admin', function() {
//    return view('admin.index');
//});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('site', 'ListaController');

Route::resource('proposta', 'PropostaController');

Route::get('admin/propostas', 'PropostaController@index');

Route::post('carrosfiltroscom', 'CarroComercialController@filtros')->name('carros.filtroscom');

// aqui seleciono a proposta
Route::get('admin/resposta{id}', 'PropostaController@responder')->name('propostas.resposta');

Route::post('admin/resposta', 'PropostaController@enviaEmail')->name('resposta');

Route::resource('admin/marcas', 'MarcaController');

Route::get('admin/propostagraf', 'PropostaController@graf')->name('proposta.graf');


