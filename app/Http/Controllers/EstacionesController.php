<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estaciones;
use Illuminate\Support\Facades\Validator;

class EstacionesController extends Controller{

    private $estacion;

    public function __construct(Estaciones $estacion){
        $this->estacion = $estacion;
    }

    public function guardarEstacion(Request $request){

        $rules = [
            'estnom' => 'required',
            'estred' => 'required'];

        $messages =[
            'estnom.required' => 'Debe ingresar un nombre',
            'estred.required' => 'Debe ingresar un nombre de red'
        ];

            $validate = Validator::make($request->all(),$rules,$messages);

            if ($validate->fails()) {
                $variables = [];
                $variables = array_merge($variables, ['valortab' => 'terminales']);
                $variables = array_merge($variables, ['messageinfo' => 'Debe completar todos los campos solicitados']);

                return redirect()->route('tablas')->with($variables)->withErrors($validate)->withInput();
            }

            $datos = \Funciones::limpiarRequest($request->all());
            $limpios = $this->estacion::crear_actualizar($datos);

            $val = \Funciones::validaciones($limpios);
            $val = array_merge($val, ['valortab' => 'terminales']);
            return redirect()->route('tablas')->with($val);

        }

        public function eliminarEstacion($terminal){
            $limpios = $this->estacion::eliminarEstacion($terminal);

            $val = \Funciones::validaciones($limpios);
            $val = array_merge($val, ['valortab' => 'terminales']);
            return redirect()->route('tablas')->with($val);
        }

}
