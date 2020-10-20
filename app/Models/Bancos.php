<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bancos extends Model
{
    protected $table = 'mgbancos';
    protected $primarykey = 'bid';
    public $timestamps = false;

    public function querybancos(){
        return $this->All();
    }

    public static function getBancos(){
        $selec = new Bancos();
        $data = $selec -> querybancos();
        return $data;
    }

    public static function crearBanco($id, $banco, $abr){
        try{
            $b = New Bancos();
            $b->bid = $id;
            $b->bdes = $banco;
            $b->babr = $abr;
            $b->save();

            return (['message'=>'Bancos actualizados.']);
        }catch(\Exception $e ){
            return (['messageerror'=>'Error en la transacción.' .$e->getMessage()]);
        }
    }


}
