<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Ventascon;

class CondicionesVentaHelper{

    public static function getAll(){
        $conven = Ventascon::All();
        return $conven;
    }

}
