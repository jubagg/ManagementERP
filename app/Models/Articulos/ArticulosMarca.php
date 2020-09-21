<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticulosMarca extends Model
{
    protected $table = 'mgartmarca';
    protected $primaryKey = 'mid';
    public $timestamps = false;
    public $incrementing = false;
    protected $KeyType = 'string';

    public static function getAll(){
        $datos = ArticulosMarca::All();
        return $datos;
    }

    public static function crearMarca($id, $marca, $abr){
        try{
            $ar = New ArticulosMarca;
            $ar->mid = $id;
            $ar->mdesc = $marca;
            $ar->mabr = $abr;
            $ar->save();

            return (['message' => 'Exito al grabar la nueva marca']);
        }catch(\Exception $e ){
            return (['messageerror' => 'Error al guardar la nueva marca: ' .$e->getMessage() .' Se anulo la transacción']);
        }
    }

    public function querymarcas(){
        return $this->All();
    }

    public static function getMarcas(){
        $selec = new ArticulosMarca();
        $data = $selec -> querymarcas();
        return $data;
    }
}
