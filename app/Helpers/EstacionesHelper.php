<?php

namespace App\Helpers;

use App\Estaciones;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class EstacionesHelper{

    public static function getAll(){
        $empresa = Estaciones::All();
        return $empresa;
    }

    public static function getEstacion($id){
        $estacion = Estaciones::where('estnomred', '=', $id)->first();
        if(!empty($estacion)){
            return $estacion->id;
        }
    }

}
