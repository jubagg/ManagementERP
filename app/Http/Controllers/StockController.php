<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock\TiposMovimSt;
use App\Articulos;
use App\Proveedores;
use App\Stock;
use App\StockDetalle;
use App\Precios;
use App\CentrosNumeracion;

class StockController extends Controller
{

    private $tiposmovimst;
    private $articulo;
    private $proveedores;
    private $stock;
    prIvate $stockDetalle;
    private $precios;
    private $centrosnumeracion;
    //private $preciosHistoricos;

    public function __construct(CentrosNumeracion $centrosnumeracion, Precios $precios, StockDetalle $stockDetalle,TiposMovimSt $tiposmovimst, Articulos $articulo, Proveedores $proveedores, Stock $stock){
        $this->tiposmovimst = $tiposmovimst;
        $this->articulo = $articulo;
        $this->proveedores = $proveedores;
        $this->stock = $stock;
        $this->stockDetalle = $stockDetalle;
        $this->precios = $precios;
        $this->centrosnumeracion = $centrosnumeracion;

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
        $listados = $this->stockDetalle::getListados();

        $emisor = \Pred::getPredeterminados( \Estaciones::getEstacion(\Funciones::getSession() != null ? \Funciones::getSession() : 0));
        //$empresa = \

        return view('/stock/movimientos')->with(compact('titulo','menu','slug','header','icon','htitulo','hmintit','tiposmov', 'proveedores', 'emisor','listados'));

    }

    public function guardarStock(Request $request){

        $tipoc = $request['tipcom'];
        $tipomov = $request['tipmovstk'];
        $cenem = $request['cememisor'];
        $compn = $request['numcom'];
        $idcli = $request['deposito'];
        $stockres = null;

        $valores = $request->all();

        //genero el id para el comprobante
        $id = \Funciones::generateId($tipoc, $tipomov, $cenem, $compn, $idcli);
        //limpio el request
        $requestLimpio = \Funciones::limpiarRequest($valores , $id);

        //traduzco los datos de la tabla
        $stockDetalle = json_decode($request['tabladatos'], true);

        //valido que la operacion no sea ni movimientro entre deposito o movimiento de compra
        if(($tipomov != '98') && ($tipomov != '99')){
            $stockres = $this->stock::saveMovim($requestLimpio);
            if(isset($stockres['message'])){
                $stockres = $this->stockDetalle::saveMovimDet($stockDetalle, $requestLimpio);
                $this->centrosnumeracion::actualizarNumeracion($cenem, $tipoc,$compn);
                if(isset($stockres['messageerror'])){
                    $stockres = $this->stock::deletemov($id);
                    $val = \Funciones::validaciones($stockres);
                    return redirect()->route('stock.movimientos')->with($val);
                }
                $val = \Funciones::validaciones($stockres);
                return redirect()->route('stock.movimientos')->with($val);
            }
        }


        //grabo movimiento entre depositos
        elseif($tipomov == 98 ){
            $stockres = $this->stock::saveMovim($requestLimpio);
            if(isset($stockres['message'])){
                $stockres = $this->stockDetalle::saveMovimDetEDep($stockDetalle, $requestLimpio);
                $this->centrosnumeracion::actualizarNumeracion($cenem, $tipoc,$compn);
                if(isset($stockres['messageerror'])){
                    $stockres = $this->stock::deletemov($id);
                    $val = \Funciones::validaciones($stockres);
                    return redirect()->route('stock.movimientos')->with($val);
                }
                $val = \Funciones::validaciones($stockres);
                return redirect()->route('stock.movimientos')->with($val);
            }
        }

        //comprobantes de compras
        elseif($tipomov == 99 ){

            $stockres = $this->stock::saveMovim($requestLimpio);
            if(isset($stockres['message'])){

                $stockres = $this->stockDetalle::saveMovimDet($stockDetalle, $requestLimpio);

                if(isset($stockres['messageerror'])){
                    $stockres = $this->stock::deletemov($id);
                    $val = \Funciones::validaciones($stockres);
                    return redirect()->route('stock.movimientos')->with($val);
                }
                if(isset($stockres['message'])){
                    $stockres = $this->precios::setPrecios($requestLimpio,$stockDetalle);
                    $this->centrosnumeracion::actualizarNumeracion($cenem, $tipoc,$compn);
                    if(isset($stockres['messageerror'])){
                        $stockres = $this->stock::deletemov($id);
                        $stockres = $this->stockDetalle::deletemov($id);
                        $val = \Funciones::validaciones($stockres);
                        return redirect()->route('stock.movimientos')->with($val);
                    }
                }
            }
        }
        $val = \Funciones::validaciones($stockres);
        return redirect()->route('stock.movimientos')->with($val);
    }


    public function busquedaArticulos($articulo = null){
        $articulo = $this->articulo::getArticulo($articulo);
        $articulo = json_encode($articulo);
            return $articulo;
    }

    public function controlNegativosController($articulo = null, $tipoc = null, $cantidad = null, $fecha = null, $deposito = null){
        $fecha = $fecha.' '.date("H:i:s");
        $control = $this->articulo::controlNegativos($articulo, $tipoc, $cantidad, $fecha,$deposito);
        $control = json_encode($control);
        return $control;
    }
}
