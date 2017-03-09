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
	Route::resource('boletas', 'boletaController');

	Route::get('/', 'HomeController@index');

	Route::resource('docentes', 'docenteController');

	Route::resource('trimestres', 'trimestreController');

	Route::resource('estudiantes', 'estudianteController');
	
	Route::get('seccion/{id}', 'estudianteController@listar')->name('nuevoid');

	Route::resource('grados', 'gradoController');

	Route::resource('seccions', 'seccionController');
	
	Route::post('destroy', function(){
		return 'Si';
	});
	Route::get('destroy', function(){
		return 'Si';
	});
	Route::group(['middleware' => 'role:superAdmin'], function(){
		Route::resource('users', 'userController');
	});
	Route::group(['middleware' => 'role:superUser'], function(){
		Route::resource('file', 'FileController');
	});

	Route::get('boletas', function(){
	   $boleta = Boleta::all();
	   return $boleta;
	   //Registro 1
	});
	Route::get('new_boleta', function(){
	   	$boletas = Boleta::all();
        return view('boletas.index')->with('boletas', $boletas);
	});

});
