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
});

//Route::get('/admin', function() {
//    return view('admin.index');
//});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('site', 'ListaController');
Route::resource('proposta', 'PropostaController');

Route::get('promocao', 'EmailController@enviaEmail');

Route::get('admin/propostas', 'PropostaController@index');

Route::get('admin/resposta', 'PropostaController@responder')->name('propostas.resposta');