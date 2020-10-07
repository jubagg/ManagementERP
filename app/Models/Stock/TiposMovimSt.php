<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Model;

class TiposMovimSt extends Model
{
    protected $table = 'mgtipmovstk';
    protected $primaryKey = 'movid';
    public $timestamps = false;

    public static function getAll(){
        $mov = TiposMovimSt::All();
        return $mov;
    }

    public static function getTipoMov($id){
        try{
            $tipoMov = TiposMovimSt::find($id);
            return $tipoMov;
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
