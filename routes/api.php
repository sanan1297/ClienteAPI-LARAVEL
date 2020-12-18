<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('Asesor', 'AsesorController@index');
Route::post('Asesor/', 'AsesorController@store');
Route::get('Asesor/{asesor}', 'AsesorController@show');
Route::put('Asesor/{asesor}', 'AsesorController@update');
Route::delete('Asesor/{asesor}', 'AsesorController@destroy');

Route::get('Cliente', 'ClienteController@index');
Route::post('Cliente/', 'ClienteController@store');
Route::get('Cliente/{cliente}', 'ClienteController@show');
Route::put('Cliente/{cliente}', 'ClienteController@update');
Route::delete('Cliente/{cliente}', 'ClienteController@destroy');

Route::get('Persona', 'PersonaController@index');
Route::post('Persona/', 'PersonaController@store');
Route::get('Persona/{persona}', 'PersonaController@show');
Route::put('Persona/{persona}', 'PersonaController@update');
Route::delete('Persona/{persona}', 'PersonaController@destroy');

Route::get('TipoDocumento', 'TipoDocumentoController@index');
Route::post('TipoDocumento/', 'TipoDocumentoController@store');
Route::get('TipoDocumento/{tipoDocumento}', 'TipoDocumentoController@show');
Route::put('TipoDocumento/{tipoDocumento}', 'TipoDocumentoController@update');
Route::delete('TipoDocumento/{tipoDocumento}', 'TipoDocumentoController@destroy');