<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


//tablas del sistema
Route::get('/tablas/' , 'TablasController@configuracionSistema')->name('tablas');
//empresas
Route::post('/tablas/empresas/guardar' , 'EmpresaController@guardarEmpresa')->name('tablas.empresas.guardar');
Route::get('/tablas/empresas/eliminar/{empresa?}' , 'EmpresaController@eliminarEmpresa')->name('tablas.empresas.eliminar');
//sucursales
Route::post('/tablas/sucursales/guardar' , 'SucursalesController@guardarSucursal')->name('tablas.sucursales.guardar');
Route::get('/tablas/sucursales/eliminar/{sucursal?}' , 'SucursalesController@eliminarSucursal')->name('tablas.sucursales.eliminar');
//usuarios
Route::post('/tablas/usuarios/guardar' , 'UsuariosController@guardarUsuario')->name('tablas.usuario.guardar');
Route::get('/tablas/usuarios/eliminar/{usuario?}' , 'UsuariosController@eliminarUsuario')->name('tablas.usuario.eliminar');
//estaciones
Route::post('/tablas/estacion/guardar' , 'EstacionesController@guardarEstacion')->name('tablas.estacion.guardar');
Route::get('/tablas/estacion/eliminar/{terminal?}' , 'EstacionesController@eliminarEstacion')->name('tablas.estacion.eliminar');
//cemtros emisores
Route::post('/tablas/emisores/guardar' , 'CentrosEmisoresController@guardarCentroEmisor')->name('tablas.emisores.guardar');
Route::get('/tablas/emisores/eliminar/{emisor?}' , 'CentrosEmisoresController@eliminarCentroEmisor')->name('tablas.emisores.eliminar');
Route::post('/tablas/emisores/numeracion/{id?}' , 'CentrosEmisoresController@getNumeracion')->name('tablas.emisores.numeracion');
Route::post('/tablas/emisores/{id?}' , 'CentrosEmisoresController@getCentroEmisor')->name('tablas.emisores.buscar');
//Reportes
Route::post('/tablas/emisores/reportes' , 'ReportesController@getReportes')->name('tablas.emisores.reportes');
//Numeracion
Route::post('/tablas/emisores/{emisor?}/{tipcom?}' , 'CentrosEmisoresController@getNum')->name('emisores.numeradores');
//predeterminados
Route::post('/tablas/predet/guardar' , 'PredeterminadosController@guardarPre')->name('tablas.predet.guardar');
Route::post('/tablas/predet/{id?}' , 'PredeterminadosController@getPre')->name('tablas.predet.buscar');
