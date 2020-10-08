<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estaciones extends Model
{
    protected $table = 'mgtabest';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public static function getEstacion($id){
        $estacion = Estaciones::where('estnomred', '=', $id)->first();
        if(!empty($estacion)){
            return $estacion;
        }
    }
}
