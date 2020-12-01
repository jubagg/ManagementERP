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
    protected $fillable = ['stkdetid','stkcontrol','stkdettipmov', 'stkdetdep','stkdettipcom','stkdetidart','stkdetart','stkdetum','stkdetcant','stkdetsaldo','stkdetfechmov','stkdetfech'];
    //protected $guarded = [];


    public static function saveMovimDet($stockDetalle = [], $stock = []){

        $movimientostk = new StockDetalle();
        $tipoMovimiento = TiposMovimSt::getTipoMov($stock['tipmovstk']);


        $contador = 0;
        $deposito = $stock['deposito'];
        $saldo = null;
        $actualizador = null;
        $cantidadFinal = null;
        $variables = array();
        $finales = array();

        try{
            foreach($stockDetalle as $sd){

                $tipoMedida = ArticulosTipoMedida::getTipo($sd['unmed']);
                $variables =['tipomedida' => $tipoMedida->tmid];
                //segun el tipo de movimiento defino si el stock suma o resta, y lo asigno
                $cantidadFinal = \TiposC::controlStock($tipoMovimiento->movtipmov,$sd['cant']);
                $variables = array_merge($variables, ['cantidadfinal' => $cantidadFinal]);
                //traigo el saldo del total de este articulo y recalculo el saldo
                $saldo = $movimientostk->detalleArtStock($sd['codart'],$stock['fecmov'].' '.date("H:i:s"),$stock['deposito']);

                if(!is_null($saldo)){
                    //$movimientostk->stkdetsaldo = $cantidadFinal;
                    $saldoGuardado = null;
                    $saldoFinal = null;
                    $saldoGuardado = $saldo;
                    $saldoFinal =   $saldoGuardado + $cantidadFinal;
                    $variables = array_merge($variables, ['saldofinal' => $saldoFinal]);

                }else{
                    $variables = array_merge($variables, ['saldofinal' => $cantidadFinal]);
                }
                $finales[$contador] = $variables;

                $data = [
                    'stkdetid' => $stock['id'],
                    'stkcontrol' => $contador,
                    'stkdettipmov' => $tipoMovimiento->movid,
                    'stkdetdep' => $stock['deposito'],
                    'stkdettipcom' => $stock['tipcom'],
                    'stkdetidart' => $stockDetalle[$contador]['codart'],
                    'stkdetart' => $stockDetalle[$contador]['descripcion'],
                    'stkdetum' => $finales[$contador]['tipomedida'],
                    'stkdetcant' => $finales[$contador]['cantidadfinal'],
                    'stkdetsaldo' => $finales[$contador]['saldofinal'],
                    'stkdetfechmov' => $stock['fecmov'].' '.date("H:i:s") ,
                    'stkdetfech' => date("Y-m-d H:i:s"),
                ];

                StockDetalle::create($data);
                //borro el saldo y reconstruyo el saldo anterior para garantizar la integridad del mismo

                $actualizador = $movimientostk->recalculoSaldo($stockDetalle[$contador]['codart'],$deposito);
                //return $actualizador;
                $recalculosaldo = null;

                foreach($actualizador as $ac){
                    $recalculosaldo = $recalculosaldo + $ac->stkdetcant;
                    //$ac->stkdetsaldo = $recalculosaldo;
                    $ac->where('stkcontrol', '=', $ac->stkcontrol)->where('stkdetfechmov', '=', $ac->stkdetfechmov)->update(['stkdetsaldo' => $recalculosaldo]);
                }

                $contador++;
            }
            return (['message' => 'Exito al grabar el nuevo movimiento.'] );
        }catch(\Exception $e){
            return (['messageerror' => 'Error al grabar el nuevo movimiento. Consulte con un programador '.$e->getMessage()] );
        }
    }

    public static function saveMovimDetEDep($stockDetalle = [], $stock = []){

        $movimientostk = new StockDetalle();
        $tipoMovimiento = TiposMovimSt::getTipoMov($stock['tipmovstk']);

        $cantidad = count($stockDetalle);
        $variables = array();
        $finales = array();
        $contador = 0;
        $saldo = null;
        $actualizador = null;
        $depor = $stock['depori'];
        $depdes = $stock['depdes'];
        //resto del primer depo
        if ($stock['depori'] != $stock['depdes']){
            foreach($stockDetalle as $sd){
                $tipoMedida = ArticulosTipoMedida::getTipo($sd['unmed']);
                $variables = ['tipomedida' => $tipoMedida->tmid];
                //segun el tipo de movimiento defino si el stock suma o resta, y lo asigno
                $cantidadFinal = \TiposC::controlStock(2,$sd['cant']);
                $variables = array_merge($variables, ['cantidadfinal' => $cantidadFinal]);
                //traigo el saldo del total de este articulo y recalculo el saldo
                $saldo = $movimientostk->detalleArtStock($sd['codart'],$stock['fecmov'].' '.date("H:i:s"),$stock['depori']);

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
                    'stkcontrol' => $contador.$stock['depori'],
                    'stkdettipmov' => $tipoMovimiento->movid,
                    'stkdetdep' => $stock['depori'],
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
                    $actualizador = $movimientostk->recalculoSaldo($stockDetalle[$contador]['codart'],$depor);
                    $arraysuma = count($actualizador);

                    $recalculosaldo = null;
                    foreach($actualizador as $ac){
                        $recalculosaldo = $recalculosaldo + $ac->stkdetcant;
                        //$ac->stkdetsaldo = $recalculosaldo;
                        $ac->where('stkcontrol', '=', $ac->stkcontrol)->where('stkdetfechmov', '=', $ac->stkdetfechmov)->update(['stkdetsaldo' => $recalculosaldo]);
                    }
                }
            }catch(\Exception $e){
                return (['messageerror' => 'Error al grabar el nuevo movimiento. Consulte con un programador '.$e->getMessage()] );
            }
        }else{
            return (['messageerror' => 'El deposito de origen no puede ser igual que el de destino. '] );
        }
        $variables = array();
        $finales = array();
        $contador = 0;
        $saldo = null;
        $actualizador = null;
        if ($stock['depori'] != $stock['depdes']){
            foreach($stockDetalle as $sd){
                $tipoMedida = ArticulosTipoMedida::getTipo($sd['unmed']);
                $variables = ['tipomedida' => $tipoMedida->tmid];
                //segun el tipo de movimiento defino si el stock suma o resta, y lo asigno
                $cantidadFinal = \TiposC::controlStock(1,$sd['cant']);
                $variables = array_merge($variables, ['cantidadfinal' => $cantidadFinal]);
                //traigo el saldo del total de este articulo y recalculo el saldo
                $saldo = $movimientostk->detalleArtStock($sd['codart'],$stock['fecmov'],$stock['depdes']);

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
                    $fechaAuxiliar  = strtotime ( "$contador seconds" , strtotime ( date("H:i:s") ) ) ;
                    $fechaSalida   = date ( 'H:i:s' , $fechaAuxiliar );
                    $data = [
                    'stkdetid' => $stock['id'],
                    'stkcontrol' => $contador.$stock['depdes'],
                    'stkdettipmov' => $tipoMovimiento->movid,
                    'stkdetdep' => $stock['depdes'],
                    'stkdettipcom' => $stock['tipcom'],
                    'stkdetidart' => $stockDetalle[$contador]['codart'],
                    'stkdetart' => $stockDetalle[$contador]['descripcion'],
                    'stkdetum' => $finales[$contador]['tipomedida'],
                    'stkdetcant' => $finales[$contador]['cantidadfinal'],
                    'stkdetsaldo' => $finales[$contador]['saldofinal'],
                    'stkdetfechmov' => $stock['fecmov'].' '.$fechaSalida,
                    'stkdetfech' => date("Y-m-d H:i:s"),
                ];

                StockDetalle::create($data);
                //borro el saldo y reconstruyo el saldo anterior para garantizar la integridad del mismo


                $actualizador = $movimientostk->recalculoSaldo($stockDetalle[$contador]['codart'],$depdes);
                $arraysuma = count($actualizador);
                $saldo = 0;
                $recalculosaldo = null;
                foreach($actualizador as $ac){
                    $recalculosaldo = $recalculosaldo + $ac->stkdetcant;
                    //$ac->stkdetsaldo = $recalculosaldo;
                    $ac->where('stkcontrol', '=', $ac->stkcontrol)->where('stkdetfechmov', '=', $ac->stkdetfechmov)->update(['stkdetsaldo' => $recalculosaldo]);
                }
            }
                return (['message' => 'Exito al grabar el nuevo movimiento.'] );
            }catch(\Exception $e){
                return (['messageerror' => 'Error al grabar el nuevo movimiento. Consulte con un programador '.$e->getMessage()] );
            }
        }else{
            return (['messageerror' => 'El deposito de origen no puede ser igual que el de destino. '] );
        }
    }
/*BUSCO POR EL ID DE ARTICULO Y LA FECHA DEL ASIENTO EN LA TABLA DETALLE Y
TRAIGO TODOS LOS VAROLES SI EL SALDO EXITE, SI NO ASIGNO LA CANTIDAD. AL TENER LA FECHA
TENGO LA CAPACIDAD DE CONTSTRUIR EL SALDO*/
    public static function detalleArtStock($id,$stock=null,$deposito = null){
            try{
                $detalle = StockDetalle::where([['stkdetidart', '=',$id],['stkdetfechmov' ,'<',$stock],['stkdetdep', '=', $deposito]])
                ->orderBy('stkdetfechmov', 'asc')
                ->get();
                $saldo = null;
                foreach($detalle as $d){
                    if($d->stkdetsaldo  = null){
                        $saldo = null;
                    }else{
                        $saldo = $saldo + $d->stkdetcant;
                    }
                }
                return $saldo;
            }catch(\Exception $e){
                return $e->getMessage();
            }
    }


    public static function recalculoSaldo($id,$deposito){
        try{
            $detalle = StockDetalle::where([['stkdetidart', '=',$id],['stkdetdep', '=', $deposito]])
            ->orderBy('stkdetfechmov', 'asc')
            ->get();

            return $detalle;
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public static function deleteMov($id){
        if($id != null){
            try{
                $movimiento = Stock::where('stkdetid', '=' ,$id)->get();
                $movimiento->delete();
                return (['message' => 'Se ha eliminado el comprobante']);
            }catch(\Exception $e){
                return (['messageerror' => 'Error al eliminar el movimiento. Consulte con un programador '.$e->getMessage()] );
            }
        }
    }

    public static function  getListados($cod = null, $art = null, $dep = null, $fech = null, $tipmov = null){


        $listado = DB::select('select m.stkdetart ,m.stkdetdep ,m.stkdetcant ,m.stkdetum ,m2.movdesc ,m.stkdetidart , m3.tmdesc , m4.depdesc ,
                                        (SELECT SUM(ms.stkdetcant) from managementerp.mgstkdet ms where ms.stkdetidart = m.stkdetidart) suma
                                        from managementerp.mgstkdet m
                                        inner join managementerp.mgtipmovstk m2
                                        on m2.movid = m.stkdettipmov
                                        inner join managementerp.mgarttipmed m3
                                        on m3.tmid = m.stkdetum
                                        inner join managementerp.mgdeposito m4
                                        on m4.depid = m.stkdetdep
                                        GROUP by m.stkdetidart
                                        order by m.stkdetfechmov, m.stkdetidart ASC;');
        return $listado;

    }
}

