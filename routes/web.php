<?php
use App\Models\boleta;
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
	Route::get('/', 'HomeController@index');	
});

Route::resource('anos', 'anoController');

Route::resource('trimestres', 'trimestreController');

Route::resource('grados', 'gradoController');

Route::resource('seccions', 'seccionController');

Route::resource('docentes', 'docenteController');

Route::resource('estudiantes', 'estudianteController');
Route::get('/filter/estudiantes','estudianteController@filter')->name('estudiantes.filter');
Route::get('/boletas/estudiante','estudianteController@boleta')->name('estudiantes.boleta');

Route::resource('boletas', 'boletaController');