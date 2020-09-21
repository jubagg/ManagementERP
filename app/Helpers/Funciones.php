<?php

namespace App\Helpers;
use App\Articulos;
class Funciones{

    private $articulos;

    public function __construct(Articulos $articulos){
        $this->articulos = $articulos;
    }

    public static function generateId($tipoc, $tipomov, $cenem, $compn, $idcli){
        $dia = date('d');
        $mes = date('m');
        $year = date('Y');
        $id = $tipoc.$tipomov.$cenem.$compn.$idcli.$dia.$mes.$year;
        return $id;
    }

    public function ingresoCod($code){
        $articulo = $this->articulos::getArticulo($code);
        return $articulo;
    }
}
