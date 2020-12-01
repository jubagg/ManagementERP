<?php

namespace App\Http\Controllers;

use App\Predeterminados;
use Illuminate\Http\Request;

class PredeterminadosController extends Controller
{
    private $predeterminados;

    public function __construct(Predeterminados $predeterminados){
        $this->predeterminados = $predeterminados;
    }

    public function guardarPre(Request $request){
        $datos = \Funciones::limpiarRequest($request->all());

        $datos = $this->predeterminados::guardarPred($datos);

        $val = \Funciones::validaciones($datos);
        $val = array_merge($val, ['valortab' => 'predet']);
        return redirect()->route('tablas')->with($val);
    }

    public function getPre($id){
        $datos = $this->predeterminados::getPredeterminados($id);
        $datos = json_encode($datos);
        return $datos;
    }
}
