<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoDocumento;

class ClienteAuxController extends Controller{

    public static function tipoDocumento(){
        $tipoDoc = TipoDocumento::All();
        return $tipoDoc;
    }
}
