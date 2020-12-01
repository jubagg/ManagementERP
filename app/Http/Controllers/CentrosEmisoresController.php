<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CentrosEmisores;
use Illuminate\Support\Facades\Validator;
use  App\CentrosNumeracion;

class CentrosEmisoresController extends Controller
{
    private $centroemisores;
    private $centrosnumeracion;

    public function __construct(CentrosEmisores $centroemisores, CentrosNumeracion $centrosnumeracion){
        $this->centroemisores = $centroemisores;
        $this->centrosnumeracion = $centrosnumeracion;
    }

    public function guardarCentroEmisor(Request $request){

        $rules = [
            'cemdes' => 'required',
        ];

        $messages =[
            'cemdes.required' => 'El centro emisor requiere este parametro',
        ];

            $validate = Validator::make($request->all(),$rules,$messages);

            if ($validate->fails()) {
                $variables = [];
                $variables = array_merge($variables, ['valortab' => 'emisores']);
                $variables = array_merge($variables, ['messageinfo' => 'Debe completar todos los campos solicitados']);

                return redirect()->route('tablas')->with($variables)->withErrors($validate)->withInput();
            }

            $datos = \Funciones::limpiarRequest($request->all());

            $limpios = $this->centroemisores::crear_actualizar($datos);
            if(isset($limpios['message'])){
                $limpios = $this->centrosnumeracion::setNum($datos);
            }else{
                $limpios = $this->centroemisores::eliminarCentro($datos['cemid']);
            }
            $val = \Funciones::validaciones($limpios);
            $val = array_merge($val, ['valortab' => 'emisores']);
            return redirect()->route('tablas')->with($val);

        }

        public function eliminarCentroEmisor($terminal){
            $limpios = $this->centroemisores::eliminarCentro($terminal);
            if(isset($limpios['message'])){
               $limpios = $this->centrosnumeracion::eliminarNumeracion($terminal);
            }
            $val = \Funciones::validaciones($limpios);
            $val = array_merge($val, ['valortab' => 'emisores']);
            return redirect()->route('tablas')->with($val);
        }

        public function getNumeracion($id){
            $id = $this->centrosnumeracion::getNum($id);
            return $id;
        }

        public function getCentroEmisor($id){
            $id = $this->centroemisores::getEmisor($id);
            $id = json_encode($id);
            return $id;
        }

        public function getNum($emisor, $tipcom){
            $id = $this->centrosnumeracion::tomarNumeracion($emisor, $tipcom);
            $id = json_encode($id);
            return $id;
        }
}
