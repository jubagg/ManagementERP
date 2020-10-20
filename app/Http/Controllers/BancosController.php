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
            'babr' => 'required|max:3'];

            $messages =[
                'bancos.required' => 'Debe ingresar un banco',
                'babr.required' => 'Debe ingresar una abreviación',
                'babr.max' => 'Solo puede ingresar 3 carácteres'
            ];
        $validate = Validator::make($request->all(), $rules, $messages)->validateWithBag('post');
        //Una vez validado procedo a grabar

        $bancos = $this->bancos::crearBanco(
            null,
            $request->input('bancos'),
            $request->input('babr')
        );

        $messageerror = null;
        $message = null;
        if(isset($bancos['messageerror'])){
            $messageerror = $bancos['messageerror'];
        }elseif(isset($bancos['message'])){
            $message = ($bancos['message']);
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
