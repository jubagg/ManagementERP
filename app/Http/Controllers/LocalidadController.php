<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Localidad;

class LocalidadController extends Controller{

    public function ajaxlistado(){
        $localidad=  Localidad::getLocalidades();
        $localidad = json_encode($localidad);

        return $localidad;
        //var_dump($localidad);
    }

    public function ajaxguardar(Request $request){
        $rules = [
            'localidad' => 'required',
            'abr' => 'required'];

            $messages =[
                'localidad.required' => 'Debe ingresar una localidad',
                'abr.required' => 'Debe ingresar una abreviación'
            ];
        $validate = $this->validate($request, $rules, $messages);
        //Una vez validado procedo a grabar

        $localidad = New Localidad();
        $localidad->lid = null;
        $localidad->ldesc = $request->input('localidad');
        $localidad->labr = $request->input('abr');
        $localidad->save();
        return response()->json(['success'=>'Localidades actualizadas.'],200);

        //return response()->json(['error' => 'Error msg'], 404);
    }
}
