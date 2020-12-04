<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

//Cliente GET
Route::get('/clientes/crear' ,'ClientesController@crear_modificar' )->name('clientes.crear');
Route::get('/clientes/modificar/{clienteid?}' , 'ClientesController@crear_modificar'  )->name('clientes.modificar');
Route::get('/clientes/listado', 'ClientesController@listado' )->name('clientes.listado');

//Clientes POST
Route::post('/clientes/update' ,'ClientesController@guardar_actualizar' )->name('clientes.update');
Route::post('/clientes/eliminar', 'ClientesController@eliminar' )->name('clientes.eliminar');

//clientes busqueda
Route::post('clientes/busqueda/{busqueda?}', 'ClientesController@buscar')->name('clientes.ajax.busqueda');
Route::post('clientes/listado', 'ClientesController@listado')->name('clientes.ajax.listado');
