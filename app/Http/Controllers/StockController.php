<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock\TiposMovimSt;
use App\Articulos;
use App\Proveedores;


class StockController extends Controller
{

    private $tiposmovimst;
    private $articulo;
    private $proveedores;

    public function __construct(TiposMovimSt $tiposmovimst, Articulos $articulo, Proveedores $proveedores){
        $this->tiposmovimst = $tiposmovimst;
        $this->articulo = $articulo;
        $this->proveedores = $proveedores;
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


        //enlace
        $id = Funciones::generateId();
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
}
