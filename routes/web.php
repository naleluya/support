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

use App\Http\Controllers\RegistroController;

Route::resource('/', 'RegistroController');
Route::get('/lista', 'RegistroController@lista_reg')->name('lista');
Route::post('/save_detalle', 'RegistroController@store');
Route::delete('/delete_reg/{id}', 'RegistroController@destroy')->name('eliminar');
Route::get('/{id}/edit', 'RegistroController@edit')->name('editar');
Route::get('/export-excel', 'RegistroController@excel')->name('excel');
Route::put('/actualizacion/{id}', 'RegistroController@update');