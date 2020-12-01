<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ReportesController;
use Illuminate\support\Facades\Storage;

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
        $valortab = 'empresa';
        $input = Storage::disk('reports')->files();



        return view('/configuracion/tablas')->with(compact('titulo','menu','slug','header','icon','htitulo','hmintit','valortab','input'));

    }
}
