<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class EmpresaController extends Controller
{
    private $empresa;

    public function __construct(Empresa $empresa){
        $this->empresa = $empresa;
    }

    public function guardarEmpresa(Request $request){
        $datos = \Funciones::limpiarRequest($request->all());
        $limpios = $this->empresa::crear_actualizar($datos);

        $val = \Funciones::validaciones($limpios);
        $val = array_merge($val, ['valortab' => 'empresa']);
        return redirect()->route('tablas')->with($val);

    }

    public function eliminarEmpresa($empresa){
        $limpios = $this->empresa::eliminarEmpresa($empresa);

        $val = \Funciones::validaciones($limpios);
        $val = array_merge($val, ['valortab' => 'empresa']);
        return redirect()->route('tablas')->with($val);
    }

}
