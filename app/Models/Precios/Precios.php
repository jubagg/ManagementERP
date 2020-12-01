<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precios extends Model
{
    protected $table = 'mgprecios';
    protected $primaryKey = 'idauto';
    public $timestamps = false;
    protected $fillable = ['idauto','idcomp','prlista','prart','prfecha','prprecom'];
    protected $guarded = [];

    public static function setPrecios($stock = [], $stockDetalle = []){

        $cantidad = count($stockDetalle);
        $contador = 0;
        try{

            for ($contador = 0; $contador < $cantidad ; $contador++) {

                $preciocompra = $stockDetalle[$contador]['precom'];
                $preciocompra = str_replace('.',',',$preciocompra);
//                $id =  [ 'prart' =>  $stockDetalle[$contador]['codart']];
                $data = [
                //'idauto' => '',
                'idcomp' => $stock['id'],
                'prart' => $stockDetalle[$contador]['codart'],
                'prfecha' => date("Y-m-d"),
                'prprecom' => $preciocompra,
                'practualizado' => 0,
                ];

                $art = Precios::where('prart', '=', $stockDetalle[$contador]['codart'])->get();
                $art = count($art);

                if($art != 0){

                    Precios::where('prart','=', $stockDetalle[$contador]['codart'] )->update(['prprecom' => $stockDetalle[$contador]['precom'],'prfecha' => date("Y-m-d"), 'practualizado' => false]);

                }else{

                    Precios::create($data);

                }
            }
            return (['message' => 'Exito al grabar el movimiento.' ] );
        }catch(\Exception $e){
            return (['messageerror' => 'Error al grabar el nuevo movimiento (precios). Consulte con un programador '.$e->getMessage()] );
        }
    }

    public static function actualizadorPrecios($datos = [], $auxiliar = null){


    }
}
