<?php

namespace App\Helpers;

use App\Sucursales;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class SucursalHelper{

    public static function getSucursal(){
        $sucursal = Sucursales::orderBy('empid', 'desc')->first();
        return $sucursal;
    }

    public static function getAll(){
        $sucursal = Sucursales::All();
        return $sucursal;
    }

}
