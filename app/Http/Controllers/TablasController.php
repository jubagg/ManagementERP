<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TablasController extends Controller
{
    public function configuracionSistema(){
        $titulo = 'Tablas del sistema';
        $menu = 'tablasm';
        $slug = 'tablasf';
        $header = 'tablash';
        $icon = 'fas fa-table';
        $htitulo = 'Tablas del sistema';
        $hmintit = 'Modificación de parámetros';


        return view('/configuracion/tablas')->with(compact('titulo','menu','slug','header','icon','htitulo','hmintit'));

    }
}
