<?php

use Illuminate\Support\Facades\Route;
use PHPJasper\PHPJasper;
use Illuminate\Support\Facades\Storage;
use App\StockDetalle;
use App\CentrosNumeracion;
use App\ListasPrecios;
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

Route::get('/', function () {
    //$resultado = \Funciones::pruebasAFIP();
/*     $input = Storage::disk('reports')->files();
     var_dump($input); */
/* $id = Pred::getPredeterminados( \Estaciones::getEstacion(\Funciones::getSession()));

    return $id; */
/*
$centro = StockDetalle::getListados();
$centro = Funciones::getReportes(); */

$listado = ListasPrecios::getLista(1);
var_dump($listado);

die();
});

//Cuentas Cuentas Bancarias
Route::post('/clientes/cuentasbancarias/crear_modificar' , 'CuentasbancariasController@crear_modificar')->name('cb.update');
Route::post('/clientes/cuentasbancarias/listado' , 'CuentasbancariasController@listadoCBancos')->name('cb.listado');
Route::post('/clientes/cuentasbancarias/eliminar/{idcb?}' , 'CuentasbancariasController@eliminarCBancos')->name('cb.eliminar');

Route::get('/comprobantes/facturas'  )->name('comprobantes.facturas');
Route::get('/comprobantes/ncredito'  )->name('comprobantes.ncredito');
Route::get('/comprobantes/ndebito'  )->name('comprobantes.ndebito');
Route::get('/comprobantes/presupuesto' )->name('comprobantes.presupuesto');
Route::get('/comprobantes/remitos' )->name('comprobantes.remitos');

//Bancos
Route::post( '/bancos/ajax/listado','BancosController@ajaxlistado')->name('bancos.ajax.listado');
Route::post('/bancos/ajax/guardar', 'BancosController@ajaxguardar')->name('bancos.ajax.guardar');

//marcas
Route::post( '/marcas/listado','MarcasController@listadoMarcas')->name('marcas.listado');
Route::post('/marcas/guardar', 'MarcasController@crearMarcas')->name('marcas.crear');

//familias
Route::post( '/familias/listado','FamiliasController@listadoFamilias')->name('familias.listado');
Route::post('/familias/guardar', 'FamiliasController@crearFamilias')->name('familias.crear');

//subfamilias
Route::post('/subfamilias/listado/{id?}','SubfamiliasController@listadoSubfamilias')->name('subfamilias.listado');
Route::post('/subfamilias/guardar', 'SubfamiliasController@crearSubfamilias')->name('subfamilias.crear');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reportes/{id?}/{valor?}', 'ReportesController@reportes')->name('reportes');
