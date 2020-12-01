<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentrosEmisores extends Model
{
    protected $table = 'mgtabcem';
    protected $primaryKey = 'cemid';
    public $timestamps = false;
    private $array = [];
    protected $guarded = [];

    public static function crear_actualizar($array){
        try{
            $id = [ 'cemid' =>    $array['cemid'] ];
            $data = [
            'cemid' =>    $array['cemid'],
            'cemdes' =>    $array['cemdes'],
            'cemmarca' =>    $array['cemmarca'],
            'cemcola' =>    $array['cemcola'],
            'cemport' =>    $array['cemport'],
            'cembaud' =>    $array['cembaud'],
            ];

            $centroemisor = CentrosEmisores::updateOrCreate($id, $data);

            return (['message' => 'Exito al grabar el movimiento.' . ' ' . $centroemisor['cemdes']] );
        }catch(\Exception $e){
            return (['messageerror' => 'Error al grabar el nuevo movimiento. Consulte con un programador '.$e->getMessage()] );
        }
    }

    public static function eliminarCentro($id){
        try{
            $centroemisor = CentrosEmisores::find($id);
            $centroemisor->delete();
            return (['message' => 'Se ha eliminado el registro exitosamente']);
        }catch(\Exception $e){
            return (['messageerror' => 'No se ha eliminado el registro.' . ' ' . $e->getMessage()]);
        }
    }

    public static function getEmisor($id){
        try {
            $centroemisor = CentrosEmisores::find($id);
            return $centroemisor;
        } catch (\Exception $e) {
            return (['messageerror' => 'No se ha eliminado el registro.' . ' ' . $e->getMessage()]);
        }
    }


}
