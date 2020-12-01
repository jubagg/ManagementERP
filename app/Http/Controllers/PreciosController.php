<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulos;
class PreciosController extends Controller
{

    private $articulos;

    public function __construct(Articulos $articulos){
        $this->articulos = $articulos;
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
}

