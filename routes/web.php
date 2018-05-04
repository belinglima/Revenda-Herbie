<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function() {
   Route::get('/', function() { return view('admin.index'); });
   Route::resource('carros', 'CarroController');
   Route::resource('usuarios', 'UserController');
});

//Route::get('/admin', function() {
//    return view('admin.index');
//});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
