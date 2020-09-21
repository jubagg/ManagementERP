<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticulosTipoBarra extends Model
{
    protected $table = 'mgartcodbart';
    protected $primaryKey = 'codtid';
    public $timestamps = false;

    public static function getAll(){
        $datos = ArticulosTipoBarra::All();
        return $datos;
    }

    public static function getCode($idcode){
        if(isset($idcode)){
            $code = ArticulosTipoBarra::find($idcode);
            return $code;
        }else{
            return null;
        }
    }
}
