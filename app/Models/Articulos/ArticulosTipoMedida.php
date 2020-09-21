<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticulosTipoMedida extends Model
{
    protected $table = 'mgarttipmed';
    protected $primaryKey = 'tmid';
    public $timestamps = false;

    public static function getAll(){
        $datos = ArticulosTipoMedida::All();
        return $datos;
    }
}
