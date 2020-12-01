<?php

namespace App\Helpers;

use App\Cajas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class CajasHelper{

    public static function getAll(){
        $cajas = Cajas::All();
        return $cajas;
    }

}
