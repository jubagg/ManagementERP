<?php

use Illuminate\Support\Facades\Route;

//Articulos
Route::get('/articulos/crear' , 'ArticulosController@crear_modificar')->name('articulos.crear');
Route::get('/articulos/modificar/{articuloid?}' ,'ArticulosController@crear_modificar' )->name('articulos.modificar');
Route::get('/articulos/listado' ,'ArticulosController@listado' )->name('articulos.listado');
Route::post('/articulos/save' , 'ArticulosController@guardar_actualizar')->name('articulos.update');
//busqueda
Route::post('articulos/busqueda/{busqueda?}', 'ArticulosController@buscar')->name('articulos.busqueda');
Route::post('articulos/listado', 'ArticulosController@listado')->name('articulos.ajax.listado');

//codigos multiples
Route::get('codigos/codigosmultiples/{articuloid?}', 'ArticulosMultiCodController@crearCodigoMulti')->name('articulos.codigosmulti.crear');
Route::post('codigos/codigosmultiples/guardar/{articuloid?}', 'ArticulosMultiCodController@guardarCodigo')->name('articulos.codigosmulti.guardar');
Route::get('codigos/codigosmultiples/eliminar/{articuloid}/barcode/{codigoid}', 'ArticulosMultiCodController@eliminarCodigoMulti')->name('articulos.codigosmulti.borrar');
