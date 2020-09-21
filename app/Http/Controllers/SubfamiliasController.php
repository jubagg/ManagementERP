<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\ArticulosSubfamilia;

class SubfamiliasController extends Controller
{
    private $articulossubfamilia;

    public function __construct (ArticulosSubfamilia $articulossubfamilia){
        $this->articulossubfamilia = $articulossubfamilia;
    }

    public function listadoSubfamilias($id = null){
        if(empty($id)){
        $subfamilia= $this->articulossubfamilia::getsubfamilias();
        $subfamilia = json_encode($subfamilia);
        return $subfamilia;
        }else{
            $subfamilia = $this->articulossubfamilia::getSubfamAsFam($id);
            $subfamilia = json_encode($subfamilia);
        return $subfamilia;
        }
    }



    public function crearSubfamilias(Request $request){

        $rules = [
            'id' => 'required|max:5|unique:App\ArticulosSubfamilia,sfid',
            'subfamilia' => 'required',
            'abrsubfamilia' => 'required|max:3'];

            $messages =[
                'subfamilia.required' => 'Debe ingresar una subfamilia',
                'id.required' => 'Debe ingresar un código de sistema',
                'id.unique' => 'El código se repite en la base de datos. Elija otro',
                'id.max' => 'Solo puede ingrear 5 carácteres',
                'abrsubfamilia.required' => 'Debe ingresar una abreviación',
                'abrsubfamilia.max' => 'Solo puede ingresar 3 carácteres'
            ];
        $validate = Validator::make($request->all(), $rules, $messages)->validateWithBag('post');
        //Una vez validado procedo a grabar

        $familia = $this->articulossubfamilia::crearSubfamilia(
            $request->input('id'),
            $request->input('subfamilia'),
            $request->input('abrsubfamilia'),
            $request->input('familia'),
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
