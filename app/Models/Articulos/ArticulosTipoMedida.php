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

    public static function getTipo($id){
        try{
            $tipoMedida = ArticulosTipoMedida::where('tmabr','=', $id)->first();
            return $tipoMedida;
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
