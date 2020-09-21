<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticulosFamilia extends Model
{
    protected $table = 'mgartfam';
    protected $primaryKey = 'afid';
    public $timestamps = false;
    public $incrementing = false;
    protected $KeyType = 'string';

    public static function getAll(){
        $datos = ArticulosFamilia::All();
        return $datos;
    }

    public static function crearFamilia($id, $familia, $abr){
        try{
            $ar = New ArticulosFamilia;
            $ar->afid = $id;
            $ar->afdesc = $familia;
            $ar->afabr = $abr;
            $ar->save();

            return (['message' => 'Exito al grabar la nueva familia']);
        }catch(\Exception $e ){
            return (['messageerror' => 'Error al guardar la nueva familia: ' .$e->getMessage() .' Se anulo la transacción']);
        }
    }

    public function queryfamilias(){
        return $this->All();
    }

    public static function getFamilias(){
        $selec = new ArticulosFamilia();
        $data = $selec -> queryfamilias();
        return $data;
    }

}
