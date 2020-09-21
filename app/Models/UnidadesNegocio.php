<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadesNegocio extends Model
{
    protected $table = 'mgartneg';
    protected $primaryKey = 'anid';
    public $timestamps = false;

    public static function getAll(){
        $datos = UnidadesNegocio::All();
        return $datos;
    }
}
