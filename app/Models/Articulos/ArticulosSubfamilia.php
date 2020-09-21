<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticulosSubfamilia extends Model
{
    protected $table = 'mgartsubfam';
    protected $primaryKey = 'sfid';
    public $timestamps = false;
    public $incrementing = false;
    protected $KeyType = 'string';

    public static function getAll(){
        $datos = ArticulosSubfamilia::All();
        return $datos;
    }

    public static function crearSubfamilia($id, $subfamilia, $abr,$fam){
        try{
            $ar = New ArticulosSubfamilia;
            $ar->sfid = $id;
            $ar->sfdesc = $subfamilia;
            $ar->sfabr = $abr;
            $ar->sfidfam = $fam;
            $ar->save();

            return (['message' => 'Exito al grabar la nueva subfamilia']);
        }catch(\Exception $e ){
            return (['messageerror' => 'Error al guardar la nueva subfamilia: ' .$e->getMessage() .' Se anulo la transacción']);
        }
    }

    public function querysubfamilias(){
        return $this->All();
    }

    public static function getSubfamilias(){
        $selec = new ArticulosSubfamilia();
        $data = $selec -> querysubfamilias();
        return $data;
    }

    public static function getSubfamAsFam($id = null){
        $select = ArticulosSubfamilia::where('sfidfam', '=', $id)->get();
        return $select;
    }
}
