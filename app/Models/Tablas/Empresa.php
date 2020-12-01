<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'mgempre';
    protected $primaryKey = 'empid';
    public $timestamps = false;
    private $array = [];
    protected $guarded = [];

    public static function crear_actualizar($array){
        try{
            $id = [ 'empid' =>    $array['empid'] ];
            $data = [
            'empid' =>    $array['empid'],
            'empnom' =>    $array['empnom'],
            'empcuit' =>    $array['empcuit'],
            'empdir' =>    $array['empdir'],
            'emptel' =>    $array['emptel'],
            'empemail' =>    $array['empmail'],
            'empfecha' =>    $array['fecha'],
            ];

            $empresa = Empresa::updateOrCreate($id, $data);

            return (['message' => 'Exito al grabar el movimiento.' . ' ' . $empresa['empnom']] );
        }catch(\Exception $e){
            return (['messageerror' => 'Error al grabar el nuevo movimiento. Consulte con un programador '.$e->getMessage()] );
        }
    }

    public static function eliminarEmpresa($id){
        try{
            $empresa = Empresa::find($id);
            $empresa->delete();
            return (['message' => 'Se ha eliminado el registro exitosamente']);
        }catch(\Exception $e){
            return (['messageerror' => 'No se ha eliminado el registro.' . ' ' . $e->getMessage()]);
        }
    }
}
