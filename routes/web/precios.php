<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

//Precios
Route::get('/precios/' , 'PreciosController@preciosIndex')->name('precios');

Route::post('precios/lista/{id?}' , 'PreciosController@preciosListas')->name('precios.listas');
Route::post('/precios/articulo/{id?}/{contex?}' , 'PreciosController@getArt')->name('precios.articulos');

