<?php

use Illuminate\Support\Facades\Route;
use PHPJasper\PHPJasper;
use Illuminate\Support\Facades\Storage;
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

    $disco = Storage::url('reports');
var_dump($disco);
/*
    $input = base_path() . '/vendor/geekcom/phpjasper/examples/Blank_A4.jrxml';
    $output = base_path() . '/vendor/geekcom/phpjasper/examples';
    $jasper = new PHPJasper;
    //$output = $jasper->listParameters($input)->execute();
    $options = [
        'format' => ['pdf'],
        'params' => ['param' => 'prueba de parametro']
    ];


        $jasper->process(
            $input,
            $output,
            $options
        )->execute();

        $pathToFile = base_path() . '/vendor/geekcom/phpjasper/examples/Blank_A4.pdf';
        $path = Storage::putFile('reports', $pathToFile); */

        $content = Storage::disk('reports')->url('Blank_A4.pdf');
        $dato = Storage::disk('reports')->download('Blank_A4.pdf');

        return response()->header('Cache-Control' , 'no-cache private')
            ->header('Content-Description' ,'File Transfer')
            ->header('Content-Type' , 'pdf')
            ->header('Content-length' , strlen($dato))
            ->header('Content-Disposition' , 'attachment; filename=test.pdf')
            ->header('Content-Transfer-Encoding' , 'binary')->view('welcome');


});
//Cliente GET
Route::get('/clientes/crear' ,'ClientesController@crear_modificar' )->name('clientes.crear');
Route::get('/clientes/modificar/{clienteid?}' , 'ClientesController@crear_modificar'  )->name('clientes.modificar');
Route::get('/clientes/listado', 'ClientesController@listado' )->name('clientes.listado');

//Clientes POST
Route::post('/clientes/update' ,'ClientesController@guardar_actualizar' )->name('clientes.update');
Route::post('/clientes/eliminar', 'ClientesController@eliminar' )->name('clientes.eliminar');

//Cuentas Cuentas Bancarias
Route::post('/clientes/cuentasbancarias/crear_modificar' , 'CuentasbancariasController@crear_modificar')->name('cb.update');
Route::post('/clientes/cuentasbancarias/listado' , 'CuentasbancariasController@listadoCBancos')->name('cb.listado');
Route::post('/clientes/cuentasbancarias/eliminar/{idcb?}' , 'CuentasbancariasController@eliminarCBancos')->name('cb.eliminar');

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

//stock movimientos
Route::get('/stock/movimientos' , 'StockController@crear')->name('stock.movimientos');
Route::post('/stock/movimientos/articulo/{articulo?}' , 'StockController@busquedaArticulos')->name('stock.movimientos.articulos');
Route::post('/stock/movimientos/articulo/{articulo?}/{tipomov?}/{cantidad?}/{fecha?}' , 'StockController@controlNegativosController')->name('stock.movimientos.negativos');
Route::post('/stock/movimientos/guardar', 'StockController@guardarStock' )->name('stock.movimientos.guardar');
Route::get('/stock/depositos'  )->name('stock.depositos');

Route::get('/comprobantes/facturas'  )->name('comprobantes.facturas');
Route::get('/comprobantes/ncredito'  )->name('comprobantes.ncredito');
Route::get('/comprobantes/ndebito'  )->name('comprobantes.ndebito');
Route::get('/comprobantes/presupuesto' )->name('comprobantes.presupuesto');
Route::get('/comprobantes/remitos' )->name('comprobantes.remitos');

//Ajax
//Localidad
Route::post( '/localidad/ajax/listado','LocalidadController@ajaxlistado')->name('localidad.ajax.listado');
Route::post('/localidad/ajax/guardar', 'LocalidadController@ajaxguardar')->name('localidad.ajax.guardar');

//clientes busqueda
Route::post('clientes/busqueda/{busqueda?}', 'ClientesController@buscar')->name('clientes.ajax.busqueda');
Route::post('clientes/listado', 'ClientesController@listado')->name('clientes.ajax.listado');

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

//tablas del sistema
Route::get('/tablas/' , 'TablasController@configuracionSistema')->name('tablas');
Route::post('/tablas/empresas/guardar' , 'EmpresaController@guardarEmpresa')->name('tablas.empresas.guardar');
Route::get('/tablas/empresas/eliminar/{empresa?}' , 'EmpresaController@eliminarEmpresa')->name('tablas.empresas.eliminar');
Route::post('/tablas/sucursales/guardar' , 'SucursalesController@guardarSucursal')->name('tablas.sucursales.guardar');
Route::get('/tablas/sucursales/eliminar/{sucursal?}' , 'SucursalesController@eliminarSucursal')->name('tablas.sucursales.eliminar');
Route::post('/tablas/usuarios/guardar' , 'UsuariosController@guardarUsuario')->name('tablas.usuario.guardar');
Route::get('/tablas/usuarios/eliminar/{usuario?}' , 'UsuariosController@eliminarUsuario')->name('tablas.usuario.eliminar');
Route::post('/tablas/estacion/guardar' , 'EstacionesController@guardarEstacion')->name('tablas.estacion.guardar');
Route::get('/tablas/estacion/eliminar/{terminal?}' , 'EstacionesController@eliminarEstacion')->name('tablas.estacion.eliminar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
