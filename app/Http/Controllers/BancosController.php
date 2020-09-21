<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bancos;
use Illuminate\Support\Facades\Validator;

class BancosController extends Controller
{

    private $bancos;

    public function __construct(Bancos $bancos){
        $this->bancos = $bancos;
    }

    public function ajaxguardar(Request $request){
        $rules = [
            'bancos' => 'required',
            'abr' => 'required'];

            $messages =[
                'bancos.required' => 'Debe ingresar un banco',
                'abr.required' => 'Debe ingresar una abreviación'
            ];
        $validate = Validator::make($request->all(), $rules, $messages)->validateWithBag('post');
        //Una vez validado procedo a grabar

        $bancos = $this->bancos::crearBanco(
            null,
            $request->input('bancos'),
            $request->input('abr')
        );

        $messageerror = null;
        $message = null;
        if(isset($retorno['messageerror'])){
            $messageerror = $retorno['messageerror'];
        }elseif(isset($retorno['message'])){
            $message = ($retorno['message']);
        };

        return response()->json( ['message' => $message , 'messageerror' =>$messageerror]);
    }

    public function ajaxlistado(){
        $bancos= $this->bancos::getBancos();
        $bancos = json_encode($bancos);

        return $bancos;
        //var_dump($localidad);
    }
}
