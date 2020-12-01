<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreciosHistoricos extends Model
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

                    Precios::create($data);

            }

            return (['message' => 'Exito al grabar el movimiento.' ] );
        }catch(\Exception $e){
            return (['messageerror' => 'Error al grabar el nuevo movimiento (precios). Consulte con un programador '.$e->getMessage()] );
        }
    }
}
