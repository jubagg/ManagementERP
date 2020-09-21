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

}
