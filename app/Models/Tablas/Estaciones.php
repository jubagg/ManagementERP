<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estaciones extends Model
{
    protected $table = 'mgtabest';
    protected $primaryKey = 'id';
    public $timestamps = false;
    private $array = [];
    protected $guarded = [];


    public static function getEstacion($id){
        $estacion = Estaciones::where('estnomred', '=', $id)->first();
        if(!empty($estacion)){
            return $estacion;
        }
    }

    public static function crear_actualizar($array){
        try{
            $id = [ 'id' =>  $array['estid'] ];
            $data = [
                'id' =>  $array['estid'],
            'estnombre' =>    $array['estnom'],
            'estnomred' =>    $array['estred'],
            ];

            $estacion = Estaciones::updateOrCreate($id, $data);

            return (['message' => 'Exito al grabar el movimiento.' . ' ' . $estacion['estnom']] );
        }catch(\Exception $e){
            return (['messageerror' => 'Error al grabar el nuevo movimiento. Consulte con un programador '.$e->getMessage()] );
        }
    }

    public static function eliminarEstacion($id){
        try{
            $sucursal = Estaciones::find($id);
            $sucursal->delete();
            return (['message' => 'Se ha eliminado el registro exitosamente']);
        }catch(\Exception $e){
            return (['messageerror' => 'No se ha eliminado el registro.' . ' ' . $e->getMessage()]);
        }
    }
}
