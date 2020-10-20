<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sucursales;
use Illuminate\Support\Facades\Validator;

class SucursalesController extends Controller
{
    private $sucursales;

    public function __construct(Sucursales $sucursales){
        $this->sucursales = $sucursales;
    }

    public function guardarSucursal(Request $request){

    $rules = [
        'sucnom' => 'required',
        'sucabr' => 'required'];

    $messages =[
        'sucnom.required' => 'Debe ingresar una descripción',
        'sucabr.required' => 'Debe ingresar una abreviación',
    ];

        $validate = Validator::make($request->all(),$rules,$messages);

        if ($validate->fails()) {
            return redirect()->route('tablas')->with(['valortab' => 'sucursales'])->withErrors($validate)->withInput();
        }

        $datos = \Funciones::limpiarRequest($request->all());
        $limpios = $this->sucursales::crear_actualizar($datos);

        $val = \Funciones::validaciones($limpios);
        $val = array_merge($val, ['valortab' => 'sucursales']);
        return redirect()->route('tablas')->with($val);

    }

    public function eliminarSucursal($sucursal){
        $limpios = $this->sucursales::eliminarSucursal($sucursal);

        $val = \Funciones::validaciones($limpios);
        $val = array_merge($val, ['valortab' => 'sucursales']);
        return redirect()->route('tablas')->with($val);
    }
}
