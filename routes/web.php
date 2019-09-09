<?php

use App\Http\Controllers\RegistroController;

Route::resource('/', 'RegistroController');
Route::get('/lista', 'RegistroController@lista_reg')->name('lista');
Route::post('/save_detalle', 'RegistroController@store');
Route::delete('/delete_reg/{id}', 'RegistroController@destroy')->name('eliminar');
Route::get('/{id}/edit', 'RegistroController@edit')->name('editar');
Route::get('/reporte_soporte', 'RegistroController@reportes');
Route::post('/actualizacion', 'RegistroController@update');
Route::post('/detalle_eliminar/{id}', 'RegistroController@destruir_detalle')->name('eliminar_det');