<?php

Route::get('/','TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/packages/{id}', 'PackageController@show'); 

Route::post('/cart', 'CartDetailController@store'); 
Route::delete('/cart', 'CartDetailController@destroy'); 

Route::post('/order', 'CartController@update'); 

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
	Route::get('/packages', 'PackageController@index'); 	//listado
	Route::get('/packages/create', 'PackageController@create'); 	//formulario
	Route::post('/packages', 'PackageController@store'); 	//Registar
	Route::get('/packages/{id}/edit', 'PackageController@edit'); 	//formulario edicion
	Route::post('/packages/{id}/edit', 'PackageController@update'); 	//Actualizar
	Route::delete('/packages/{id}', 'PackageController@destroy'); 	//formulario eliminar

	Route::get('/packages/{id}/images', 'ImageController@index');  //listado
	Route::post('/packages/{id}/images', 'ImageController@store'); 	//Registar
	Route::delete('/packages/{id}/images', 'ImageController@destroy'); 	//formulario eliminar
	Route::get('/packages/{id}/images/select/{image}', 'ImageController@select');  //destacar imagen
});

Route::get('phpinfo', function () {
    return phpinfo();
});

// cr
// ud

