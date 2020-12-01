<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    protected $table = 'mgstkcab';
    protected $primaryKey = 'stkid';
    public $timestamps = false;

    public static function saveMovim($stock = []){

        $movimientostk = new Stock();

        try{
            $movimientostk->stkid = $stock['id'] ;
            $movimientostk->stktipmov = $stock['tipmovstk'];
            $movimientostk->stktipcom = $stock['tipcom'];
            $movimientostk->stkdep = $stock['deposito'];
            $movimientostk->stkcenem = $stock['cememisor'];
            $movimientostk->stknumcom = $stock['numcom'];
            $movimientostk->stkcomfec = $stock['fecmov'];
            $movimientostk->stkprov = $stock['proveedor'];
            $movimientostk->stkcenemprov = $stock['cempro'];
            $movimientostk->stkcomprov = $stock['numcompro'];
            //$movimientostk->stkvalrpov = $stock['tipmovstk']; ITEM PARA VER SI VA VALORIZADO
            $movimientostk->stkcomfecprov = $stock['feccompro'];
            $movimientostk->stkmovdepor = $stock['depori'];
            $movimientostk->stkmovdepdes = $stock['depdes'];
            $movimientostk->stkmovdepfec = $stock['fecmovint'];
            $movimientostk->stkfecreg = $stock['fecha'];
            //$movimientostk->stkuser = $stock['tipmovstk']; USUARIO PARA CUANDO TENGA LA VALIDACION ACTIVA
            $movimientostk->save();
            return (['message' => 'Exito al grabar el nuevo movimiento.']);
        }catch(\Exception $e){
            return (['messageerror' => 'Error al grabar el nuevo movimiento. Consulte con un programador '.$e->getMessage()]);
        }
    }

    public static function deleteMov($id){
        if($id != null){
            try{
                $movimiento = Stock::find($id);
                $movimiento->delete();
                return (['message' => 'Se ha eliminado el comprobante']);
            }catch(\Exception $e){
                return (['messageerror' => 'Error al eliminar el movimiento. Consulte con un programador '.$e->getMessage()] );
            }
        }
    }
}
