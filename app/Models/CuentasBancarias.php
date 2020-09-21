<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentasBancarias extends Model{

    protected $table = 'mgclibancos';
    protected $primaryKey = 'cbid';
    public $timestamps = false;

    public function querybancos(){
        return $this->All();
    }


    public static function crearCuentaBancaria($accion, $cliente, $cbu, $banco, $sucursal, $tipcuenta){
        try{
            $cb = New CuentasBancarias;
            $cb->cbid = null;
            $cb->cbidcli = $cliente;
            $cb->cbcbu = $cbu;
            $cb->cbban = $banco;
            $cb->cbsuc = $sucursal;
            $cb->cbtipcue =$tipcuenta;
            $cb->save();
            return (['message' => 'Exito al grabar la nueva cuenta bancaria']);
        }catch(\Exception $e ){
            return (['messageerror' => 'Error al guardar la nueva cuenta: ' .$e->getMessage() .' Se anulo la transacción']);
        }
    }

    public static function listadoCuentasBancarias(){
        $listado = CuentasBancarias::all();
        //$listado = json_encode($listado);
        return $listado;
    }

    public static function listadoCuentasBancariasAjax(){
        $listado = CuentasBancarias::select('mgclibancos.cbid', 'mgclibancos.cbcbu','mgclibancos.cbsuc','mgclibancos.cbtipcue','mgbancos.bdes')
                ->join('mgbancos', 'mgclibancos.cbban', '=', 'mgbancos.bid')
                ->get();

                return $listado;
    }

    public static function borrarcb($id){
        try{
            $borrar = CuentasBancarias::find($id);
            $borrar->delete();
            return (['message' => 'Se ha eliminado el registro satisfactoriamente']);
        }catch(\Exception $e){
            return (['messageerror' => 'Error al eliminar la cuenta: ' .$e->getMessage() .' Se anulo la transacción']);
        }
    }

    public function bancos(){
        return $this->hasMany('App\Bancos','bid',  'cbban');
    }
}
