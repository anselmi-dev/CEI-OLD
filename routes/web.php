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
Auth::routes();

Route::group(['middleware' => 'auth'], function()
{
	Route::resource('boletas', 'boletaController');

	Route::get('/', 'HomeController@index');

	Route::resource('docentes', 'docenteController');

	Route::resource('trimestres', 'trimestreController');

	Route::resource('estudiantes', 'estudianteController');
	
	Route::get('seccion/{id}', 'estudianteController@listar')->name('nuevoid');

	Route::resource('grados', 'gradoController');

	Route::resource('seccions', 'seccionController');

	Route::resource('file', 'FileController');

});