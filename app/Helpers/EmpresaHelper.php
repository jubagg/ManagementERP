<?php

namespace App\Helpers;

use App\Empresa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class EmpresaHelper{

    public static function getEmpresa(){
        $empresa = Empresa::orderBy('empid', 'desc')->first();
        return $empresa;
    }

}

