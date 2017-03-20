<?php
use App\Models\boleta;
use App\Mail\correoNotificacion as Notificacion;
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

	Route::resource('anos', 'anoController');

	Route::resource('trimestres', 'trimestreController');

	Route::resource('grados', 'gradoController');

	Route::resource('seccions', 'seccionController');

	Route::resource('docentes', 'docenteController');

	Route::resource('estudiantes', 'estudianteController');

	Route::get('/filter/estudiantes','estudianteController@filter')->name('estudiantes.filter');

	Route::get('/boletas/estudiante','estudianteController@boleta')->name('estudiantes.boleta');
	Route::post('/promover/estudiantes','estudianteController@promover')->name('estudiantes.promover');

	Route::post('boletas.store', 'boletaController@store')->name('boletas.store');

	Route::delete('boletas/{id}', 'boletaController@destroy')->name('boletas.destroy');

	Route::resource('mails', 'mailsController');
	
	Route::post('/ajax2', function(){
		if (Request::ajax()) {
			return Response::json(Request::all());
		}
		return 'no ajax';
	});

	Route::get('emails', function(){
		$toEmails = array('carlosanselmi2@gmail.com','carlosanselmi3@hotmail.com');
		return Mail::to('carlosanselmi2@gmail.com')
			->cc($toEmails)
			->send(new Notificacion());
	});

	Route::get("test-email", function() {
	    Mail::send("mails.notificacion", [], function($message) {
	        $message->to("oscarp171@gmail.com", "Luis Garcia")
	        ->subject("Notificacion de boleta CEI!");
	    });
	});

});
