<?php

namespace App\Helpers;

use App\Predeterminados;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class PredeterminadosHelper{

    public static function getPredeterminados($estacion){
        $pred = Predeterminados::findOrFail($estacion);
        return $pred;
    }

}
