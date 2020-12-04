<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulos;
use App\Precios;
use App\PreciosHistoricos;
use App\ListasPrecios;

class PreciosController extends Controller
{

    private $articulos;
    private $listaPrecios;

    public function __construct(Articulos $articulos, ListasPrecios $listaPrecios){
        $this->articulos = $articulos;
        $this->listaPrecios = $listaPrecios;
    }

    public function preciosIndex(){
        $titulo = 'Administración de precios';
        $menu = 'preciosm';
        $slug = 'preciosf';
        $header = 'preciosh';
        $icon = 'fas fa-dollar-sign';
        $htitulo = 'Precios';
        $hmintit = 'Seteos de precios';
        $valortab = '';
        $articulos = $this->articulos::artPrecios();




        return view('/precios/precios')->with(compact('titulo','menu','slug','header','icon','htitulo','hmintit','valortab','articulos'));

    }

    public function preciosListas($id){
        $lista = $this->listaPrecios::getLista($id);
        return json_encode($lista, true);
    }

    public function getArt($id,$contex){
        $lista = $this->articulos::getArticulo($id,$contex);
        return $lista;
    }
}

