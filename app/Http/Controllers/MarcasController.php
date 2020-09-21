<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArticulosMarca;
use Illuminate\Support\Facades\Validator;

class MarcasController extends Controller{

    private $articulosmarca;

    public function __construct (ArticulosMarca $articulosmarca){
        $this->articulosmarca = $articulosmarca;
    }

    public function listadoMarcas(){
        $marcas= $this->articulosmarca::getMarcas();
        $marcas = json_encode($marcas);

        return $marcas;
    }

    public function crearMarcas(Request $request){

        $rules = [
            'idmarca' => 'required|max:5|unique:App\ArticulosMarca,mid',
            'marca' => 'required',
            'abrmarca' => 'required|max:3'];

            $messages =[
                'marca.required' => 'Debe ingresar una marca',
                'idmarca.required' => 'Debe ingresar un código de sistema',
                'idmarca.max' => 'Solo puede ingrear 5 carácteres',
                'idmarca.unique' => 'El código se repite en la base de datos. Elija otro',
                'abrmarca.required' => 'Debe ingresar una abreviación',
                'abrmarca.max' => 'Solo puede ingresar 3 carácteres'
            ];
        $validate = Validator::make($request->all(), $rules, $messages)->validateWithBag('post');
        //Una vez validado procedo a grabar

        $marcas = $this->articulosmarca::crearMarca(
            $request->input('idmarca'),
            $request->input('marca'),
            $request->input('abrmarca')
        );

        $messageerror = null;
        $message = null;
        if(isset($marcas['messageerror'])){
            $messageerror = $marcas['messageerror'];
        }elseif(isset($marcas['message'])){
            $message = ($marcas['message']);
        };

        return response()->json( ['message' => $message , 'messageerror' =>$messageerror]);
    }
}
