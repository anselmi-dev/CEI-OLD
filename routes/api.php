<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});














Route::resource('grados', 'gradoAPIController');





Route::resource('docentes', 'docenteAPIController');

Route::resource('seccions', 'seccionAPIController');



Route::resource('seccions', 'seccionAPIController');

Route::resource('seccions', 'seccionAPIController');

Route::resource('seccions', 'seccionAPIController');

Route::resource('seccions', 'seccionAPIController');













Route::resource('anos', 'anoAPIController');

Route::resource('trimestres', 'trimestreAPIController');

Route::resource('boletas', 'boletaAPIController');

Route::resource('seccions', 'seccionAPIController');

Route::resource('boletas', 'boletaAPIController');

Route::resource('boletas', 'boletaAPIController');