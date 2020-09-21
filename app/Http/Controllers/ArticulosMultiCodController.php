<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulos;
use App\ArticulosMultiCod;
use App\Empresa;

class ArticulosMultiCodController extends Controller{

    private $articulos;
    private $articulosmulticod;

    public function __construct(Articulos $articulos, ArticulosMultiCod $articulosmulticod){
        $this->articulos = $articulos;
        $this->articulosmulticod = $articulosmulticod;
    }

    public function crearCodigoMulti($articuloid){

        $titulo = 'Crear código de barras';
        $menu = null;
        $slug = 'crear_multicodf';
        $header = 'crear_multicodh';
        $icon = 'fas fa-barcode';
        $htitulo = 'Códigos de barras múltiples';
        $hmintit = 'Crear código de barras';
        $articulo = $this->articulos::getArticulo($articuloid);
        $listado = $this->articulosmulticod::getCodArt($articuloid);

        return view('codigos/codigosmultiples')->with(compact('titulo','menu','slug','header','icon','htitulo','hmintit','articulo','listado'));

    }

    public function guardarCodigo(Request $request){
        $multicodigo = $this->articulosmulticod::nuevoCodigo(
            $request->input('artcod'),
            $request->input('codigo'),
            $request->input('descripcion'),
            $request->input('cantidad'));


        $messageerror = null;
        $message = null;

            if(isset($multicodigo['messageerror']) /* && $multicodigo['action'] == 'modificar' */){
                $messageerror = $multicodigo['messageerror'];
                return redirect()->route('articulos.codigosmulti.crear', $request->input('artcod'))->with([
                    'messageerror' => $messageerror
                ]);
            }elseif(isset($multicodigo['message']) /* && $multicodigo['action'] == 'modificar' */){
                $message = ($multicodigo['message']);
                return redirect()->route('articulos.codigosmulti.crear', $request->input('artcod') )->with([
                    'message' => $message
            ]);
        };
    }

    public function eliminarCodigoMulti($articuloid,$codigoid){
        $multicodigo = $this->articulosmulticod::deleteCodArt($codigoid);

        $messageerror = null;
        $message = null;

        if(isset($multicodigo['messageerror']) /* && $multicodigo['action'] == 'modificar' */){
            $messageerror = $multicodigo['messageerror'];
            return redirect()->route('articulos.codigosmulti.crear', $articuloid)->with([
                'messageerror' => $messageerror
            ]);
        }elseif(isset($multicodigo['message']) /* && $multicodigo['action'] == 'modificar' */){
            $message = ($multicodigo['message']);
            return redirect()->route('articulos.codigosmulti.crear', $articuloid )->with([
                'message' => $message]);
        };
    }

}
