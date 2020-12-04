<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


//Ajax
//Localidad
Route::post( '/localidad/ajax/listado','LocalidadController@ajaxlistado')->name('localidad.ajax.listado');
Route::post('/localidad/ajax/guardar', 'LocalidadController@ajaxguardar')->name('localidad.ajax.guardar');
