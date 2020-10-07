<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ArticulosTipoMedida;
use App\Models\Stock\TiposMovimSt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class StockDetalle extends Model
{
    protected $table = 'mgstkdet';
    protected $primaryKey = 'stkdetid';
    public $timestamps = false;
    protected $fillable = ['stkdetid','stkcontrol','stkdettipmov','stkdettipcom','stkdetidart','stkdetart','stkdetum','stkdetcant','stkdetsaldo','stkdetfechmov','stkdetfech'];
    //protected $guarded = [];


    public static function saveMovimDet($stockDetalle = [], $stock = []){

        $movimientostk = new StockDetalle();
        $tipoMovimiento = TiposMovimSt::getTipoMov($stock['tipmovstk']);

        $cantidad = count($stockDetalle);
        $variables = array();
        $finales = array();
        $contador = 0;
        $saldo = null;
        $actualizador = null;

        foreach($stockDetalle as $sd){
            $tipoMedida = ArticulosTipoMedida::getTipo($sd['unmed']);
            $variables =['tipomedida' => $tipoMedida->tmid];
            //segun el tipo de movimiento defino si el stock suma o resta, y lo asigno
            $cantidadFinal = \TiposC::controlStock($tipoMovimiento->movtipmov,$sd['cant']);
            $variables = array_merge($variables, ['cantidadfinal' => $cantidadFinal]);
            //traigo el saldo del total de este articulo y recalculo el saldo
            $saldo = $movimientostk->detalleArtStock($sd['codart'],$stock['fecmov']);

            if(!is_null($saldo)){
                //$movimientostk->stkdetsaldo = $cantidadFinal;
                $saldoGuardado = $saldo;
                $saldoFinal =   $saldoGuardado + $cantidadFinal;
                $variables = array_merge($variables, ['saldofinal' => $saldoFinal]);
            }else{
                $variables = array_merge($variables, ['saldofinal' => $cantidadFinal]);
            }
            $finales[$contador] = $variables;
            $contador++;
        }

        try{
            //foreach($stockDetalle as $sd){
            for ($contador = 0; $contador < $cantidad ; $contador++) {
                $data = [
                'stkdetid' => $stock['id'],
                'stkcontrol' => $contador,
                'stkdettipmov' => $tipoMovimiento->movid,
                'stkdettipcom' => $stock['tipcom'],
                'stkdetidart' => $stockDetalle[$contador]['codart'],
                'stkdetart' => $stockDetalle[$contador]['descripcion'],
                'stkdetum' => $finales[$contador]['tipomedida'],
                'stkdetcant' => $finales[$contador]['cantidadfinal'],
                'stkdetsaldo' => $finales[$contador]['saldofinal'],
                'stkdetfechmov' => $stock['fecmov'].' '.date("H:i:s"),
                'stkdetfech' => date("Y-m-d H:i:s"),
            ];

            StockDetalle::create($data);
            //borro el saldo y reconstruyo el saldo anterior para garantizar la integridad del mismo
            $saldo = 0;
            $actualizador = $movimientostk->recalculoSaldo($stockDetalle[$contador]['codart']);
            $arraysuma = count($actualizador);

            foreach($actualizador as $ac){

                $saldo = $saldo + $ac->stkdetcant;
                $idcom =  $ac->stkdetid;
                $idcon = $ac->stkcontrol;
                $ac->stkdetsaldo = $saldo;
                $ac->update();
            }
        }
            return (['message' => 'Exito al grabar el nuevo movimiento.'] );
        }catch(\Exception $e){
            return (['messageerror' => 'Error al grabar el nuevo movimiento. Consulte con un programador '.$e->getMessage()] );
        }
    }
/*BUSCO POR EL ID DE ARTICULO Y LA FECHA DEL ASIENTO EN LA TABLA DETALLE Y
TRAIGO TODOS LOS VAROLES SI EL SALDO EXITE, SI NO ASIGNO LA CANTIDAD. AL TENER LA FECHA
TENGO LA CAPACIDAD DE CONTSTRUIR EL SALDO*/
    public static function detalleArtStock($id,$stock=null){
            try{
                $detalle = StockDetalle::where([['stkdetidart', '=',$id],['stkdetfechmov' ,'<',$stock]])
                ->orderBy('stkdetfechmov', 'asc')
                ->get();
                $saldo = null;
                foreach($detalle as $d){
                    if($d->stkdetsaldo  = null){
                        $saldo = $d->stkdetcant;
                    }else{
                        $saldo = $saldo + $d->stkdetcant;
                    }
                }
                return $saldo;
            }catch(\Exception $e){
                return $e->getMessage();
            }
    }


    public static function recalculoSaldo($id,$stock=null){
        try{
            $detalle = StockDetalle::where('stkdetidart', '=',$id)
            ->orderBy('stkdetfechmov', 'asc')
            ->get();

            return $detalle;
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}

