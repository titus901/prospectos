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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PageController@index');
Route::get('/agragarView', 'PageController@agregarView');
Route::post('/agragarView/enviar', 'PageController@agregarViewEnviar');
Route::get('/listadoView', 'PageController@listadoView');
Route::get('/evaluacionView/{id}', 'PageController@EvaluacionView');
Route::post('/evaluacionView/{id}', 'PageController@EvaluacionViewEnviar');