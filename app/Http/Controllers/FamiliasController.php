<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\ArticulosFamilia;

class FamiliasController extends Controller{
    private $articulosfamilia;

    public function __construct (ArticulosFamilia $articulosfamilia){
        $this->articulosfamilia = $articulosfamilia;
    }

    public function listadoFamilias(){
        $familia= $this->articulosfamilia::getFamilias();
        $familia = json_encode($familia);

        return $familia;
    }

    public function crearFamilias(Request $request){

        $rules = [
            'id' => 'required|max:5|unique:App\ArticulosFamilia,afid',
            'familia' => 'required',
            'abrfamilia' => 'required|max:3'];

            $messages =[
                'familia.required' => 'Debe ingresar una familia',
                'id.required' => 'Debe ingresar un código de sistema',
                'id.unique' => 'El código se repite en la base de datos. Elija otro',
                'id.max' => 'Solo puede ingrear 5 carácteres',
                'abrfamilia.required' => 'Debe ingresar una abreviación',
                'abrfamilia.max' => 'Solo puede ingresar 3 carácteres'
            ];
        $validate = Validator::make($request->all(), $rules, $messages)->validateWithBag('post');
        //Una vez validado procedo a grabar

        $familia = $this->articulosfamilia::crearFamilia(
            $request->input('id'),
            $request->input('familia'),
            $request->input('abrfamilia')
        );

        $messageerror = null;
        $message = null;
        if(isset($familia['messageerror'])){
            $messageerror = $familia['messageerror'];
        }elseif(isset($familia['message'])){
            $message = ($familia['message']);
        };

        return response()->json( ['message' => $message , 'messageerror' =>$messageerror]);
    }
}
