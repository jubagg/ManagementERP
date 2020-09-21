<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CuentasBancarias;
use Illuminate\Support\Facades\Validator;

class CuentasBancariasController extends Controller
{

    private $cuentasbancarias;

    public function __construct(CuentasBancarias $cuentasbancarias){
        $this->cuentasbancarias = $cuentasbancarias;
    }

    public function crear_modificar(Request $request){
        $rules = [
            'cbcbu' => 'required|integer',
            'cbbanco' => 'required',
            'tipcue' => 'required'];

            $messages =[
                'cbcbu.required' => 'Debe ingresar un CBU',
                'cbcbu.integer' => 'El CBU debe ser númerico',
                'cbbanco.required' => 'Debe ingresar un banco valido',
                'tipcue.required' => 'Debe seleccionar un tipo de cuenta'
            ];
        $validator = Validator::make($request->all(), $rules, $messages)->validateWithBag('post');

            //Una vez validado procedo a grabar
        $retorno = $this->cuentasbancarias::crearCuentaBancaria(
            null,
            $request->input('cbcliente'),
            $request->input('cbcbu'),
            $request->input('cbbanco'),
            $request->input('cbsucursal'),
            $request->input('tipcue'));

            $messageerror = null;
            $message = null;
            if(isset($retorno['messageerror'])){
                $messageerror = $retorno['messageerror'];
            }elseif(isset($retorno['message'])){
                $message = ($retorno['message']);
            };

        return response()->json( ['message' => $message , 'messageerror' =>$messageerror]);
    }

    public function listadoCBancos(Request $request){
/*         if(!$request->ajax()){
            $listado = $this->cuentasbancarias::listadoCuentasBancarias();
            return response()->json( ['listado' => $listado]);
        }else{ */
            $listado = $this->cuentasbancarias::listadoCuentasBancariasAjax();
            $listado = json_encode($listado);
            return $listado;
    }

    public function eliminarCBancos($idcb = null){
        $eliminar = $this->cuentasbancarias::borrarcb($idcb);
        $messageerror = null;
        $message = null;
        if(isset($eliminar['messageerror'])){
            $messageerror = $eliminar['messageerror'];
        }elseif(isset($eliminar['message'])){
            $message = ($eliminar['message']);
        };
        return response()->json( ['message' => $message , 'messageerror' =>$messageerror]);
    }
}
