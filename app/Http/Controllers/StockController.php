<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock\TiposMovimSt;
use App\Articulos;
use App\Proveedores;
use App\Stock;
use App\StockDetalle;


class StockController extends Controller
{

    private $tiposmovimst;
    private $articulo;
    private $proveedores;
    private $stock;
    prIvate $stockDetalle;

    public function __construct(StockDetalle $stockDetalle,TiposMovimSt $tiposmovimst, Articulos $articulo, Proveedores $proveedores, Stock $stock){
        $this->tiposmovimst = $tiposmovimst;
        $this->articulo = $articulo;
        $this->proveedores = $proveedores;
        $this->stock = $stock;
        $this->stockDetalle = $stockDetalle;
    }
    public function crear(){
        $titulo = 'Movimientos de stock';
        $menu = 'movimientos_stockm';
        $slug = 'movimientos_stockf';
        $header = 'movimientos_stockh';
        $icon = 'fas fa-truck-loading';
        $htitulo = 'Movimientos de stock';
        $hmintit = 'Nuevo movimiento de stock';
        $tiposmov = $this->tiposmovimst::getAll();
        $proveedores = $this->proveedores::getAll();
        //$empresa = \

        return view('/stock/movimientos')->with(compact('titulo','menu','slug','header','icon','htitulo','hmintit','tiposmov', 'proveedores'));

    }

    public function guardarStock(Request $request){

        $tipoc = $request['tipcom'];
        $tipomov = $request['tipmovstk'];
        $cenem = $request['cememisor'];
        $compn = $request['numcom'];
        $idcli = $request['deposito'];

        $valores = $request->all();
        //enlace
        $id = \Funciones::generateId($tipoc, $tipomov, $cenem, $compn, $idcli);
        $requestLimpio = \Funciones::limpiarRequest($valores , $id);
        $stockDetalle = json_decode($request['tabladatos'], true);


        //$stockres = $this->stockDetalle::saveMovimDet($stockDetalle, $requestLimpio);

        //$stockres = $this->stock::saveMovim($requestLimpio);
        //if(isset($stockres['message'])){
            $stockres = $this->stockDetalle::saveMovimDet($stockDetalle, $requestLimpio);
        //}elseif(isset($stockres['message'])){

        //}

        var_dump($stockres);

        die();
        //cabecera
        /* "user" */
        /* "tipmovstk"
        ,"deposito"
        "cememisor"
        "numcom"
        "fecmov"
        //proveedor
        "proveedor"
        "cempro"
        "numcompro"
        "feccompro"
        //movim entre deposito
        "depori"
        "depdes"
        "cemprop"
        "compint"
        "fecmovint"
        // helpers
        "codartstk"
        "codcantstk"
        "codprecstk"
        //comrpobante detalle
        json_decode("tabladatos"); */
        //contabilidad
        /* */
    }

    public function busquedaArticulos($articulo = null){
        $articulo = $this->articulo::getArticulo($articulo);
        $articulo = json_encode($articulo);
            return $articulo;
    }

    public function controlNegativosController($articulo = null, $tipoc = null, $cantidad = null, $fecha = null){
        $fecha = $fecha.' '.date("H:i:s");
        $control = $this->articulo::controlNegativos($articulo, $tipoc, $cantidad, $fecha);
        $control = json_encode($control);
        return $control;
    }
}
