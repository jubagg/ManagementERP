<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\TiposComprobantes;

class TiposComprobantesHelper{

    public static function getComprobantes(){
        $tiposComprobantes = TiposComprobantes::All();
        return $tiposComprobantes;
    }

    public static function controlStock($tipoCom, $cantidad){
        if($tipoCom == 1){
            return $cantidad;
        }elseif($tipoCom == 2){
            $resultado = $cantidad * (-1);
            return $resultado;
        }
    }

}
