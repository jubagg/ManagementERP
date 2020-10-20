<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursales extends Model
{
    protected $table = 'mgclisuc';
    protected $primaryKey = 'sid';
    public $timestamps = false;

    public function querysuc(){
        return $this->All();
    }

    public static function getSucursal(){
        $selec = new Sucursales();
        $data = $selec -> querysuc();
        return $data;
    }

    private $array = [];
    protected $guarded = [];

    public static function crear_actualizar($array){
        try{
            $id = [ 'sid' =>  $array['sucid'] ];
            $data = [
            'sid' =>    $array['sucid'],
            'sdes' =>    $array['sucnom'],
            'sabr' =>    $array['sucabr'],
            ];

            $sucursal = Sucursales::updateOrCreate($id, $data);

            return (['message' => 'Exito al grabar el movimiento.' . ' ' . $sucursal['sdes']] );
        }catch(\Exception $e){
            return (['messageerror' => 'Error al grabar el nuevo movimiento. Consulte con un programador '.$e->getMessage()] );
        }
    }

    public static function eliminarSucursal($id){
        try{
            $sucursal = Sucursales::find($id);
            $sucursal->delete();
            return (['message' => 'Se ha eliminado el registro exitosamente']);
        }catch(\Exception $e){
            return (['messageerror' => 'No se ha eliminado el registro.' . ' ' . $e->getMessage()]);
        }
    }
}
