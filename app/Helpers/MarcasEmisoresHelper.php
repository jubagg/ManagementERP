<?php

namespace App\Helpers;

use App\MarcasEmisores;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class MarcasEmisoresHelper{

    public static function getAll(){
        $marcas = MarcasEmisores::All();
        return $marcas;
    }

}
