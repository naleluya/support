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

Route::resource('/', 'RegistroController');
Route::get('/lista', 'RegistroController@lista_reg')->name('lista');
Route::post('/save_detalle', 'RegistroController@store');
Route::delete('/delete_reg/{id}', 'registroController@destroy')->name('eliminar');
