<?php

namespace App\Helpers;

use App\ListasPrecios;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class ListaPreciosHelper{

    public static function getAll(){
        $marcas = ListasPrecios::All();
        return $marcas;
    }

}
