<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

//stock movimientos
Route::get('/stock/movimientos' , 'StockController@crear')->name('stock.movimientos');
Route::post('/stock/movimientos/articulo/{articulo?}' , 'StockController@busquedaArticulos')->name('stock.movimientos.articulos');
Route::post('/stock/movimientos/articulo/{articulo?}/{tipomov?}/{cantidad?}/{fecha?}/{deposito?}' , 'StockController@controlNegativosController')->name('stock.movimientos.negativos');
Route::post('/stock/movimientos/guardar', 'StockController@guardarStock' )->name('stock.movimientos.guardar');
Route::get('/stock/depositos'  )->name('stock.depositos');
