<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentrosNumeracion extends Model
{
    protected $table = 'mgtabcemnum';
    protected $primaryKey = 'cemid';
    public $timestamps = false;
    private $array = [];
    protected $guarded = [];
    protected $fillable = ['cemid','tipcom','nomcom','ultnum','ultfech','numcop','impdest','refrep'];

    public static function setNum($cem =  []){
        //convierto el json a array para manipularlo
        $datosComprobantes = json_decode($cem['numeraciondatos'],true);

        //armo el try catch
        try {
            foreach($datosComprobantes as $datos){
                 $id = ['cemid' => $cem['cemid'], 'tipcom' => $datos['id']];
                 $data =
                 ['cemid' => $cem['cemid'],
                 'tipcom' => $datos['id'],
                 'nomcom' => $datos['comp'],
                 'ultnum' => $datos['ultcom'],
                 'ultfech' => $datos['ultfec'],
                 'numcop' => $datos['cop'],
                 'impdest' => '',
                 'refrep' => $datos['report']];

                 if($cem['action'] == 'crear'){
                    $datos = CentrosNumeracion::create($data);
                }else{
                    CentrosNumeracion::where([['cemid', '=' , $cem['cemid']],['tipcom' , '=', $datos['id']]])->update($data);
                }
            }
            return (['message' => 'Exito al grabar el centro emisor.'] );
        } catch (\Exception $e) {
            return (['messageerror' => 'No se ha agregado el registro.' . ' ' . $e->getMessage()]);
        }
    }

    public static function eliminarNumeracion($id){
        try{
            $centroemisor = CentrosNumeracion::where('cemid', '=',$id)->get();
            $centroemisor->delete();
            return (['message' => 'Se ha eliminado el registro exitosamente']);
        }catch(\Exception $e){
            return (['messageerror' => 'No se ha eliminado el registro.' . ' ' . $e->getMessage()]);
        }
    }
    public static function getNum($id){
        $num = CentrosNumeracion::where('cemid', '=', $id)->get();
        $num = json_encode($num);
        return $num;
    }

    public static function actualizarNumeracion($emisor, $tipcom,$num){
        try{
/*             $numeracion = CentrosNumeracion::where([['cemid', '=' , $emisor],['tipcom' , '=', $tipcom]])->first();
            $ultimo= $numeracion->ultnum;
            $final = $ultimo + 1; */

            $data = [
                'ultnum' => $num,
                'ultfech' => date("Y-m-d"),
            ];
            $comprobante =  CentrosNumeracion::where([['cemid', '=' , $emisor],['tipcom' , '=', $tipcom]])->update($data);

        }catch(\Exception $e){
            return (['messageerror' => 'Error al registrar el último número del comprobante '. $e->getMessage()]);
        }
    }

    public static function tomarNumeracion($centro, $tipcom){
        try{
            $numeracion = CentrosNumeracion::where([['cemid', '=' , $centro],['tipcom' , '=', $tipcom]])->first();
            return $numeracion;
        }catch(\Exception $e){
            return (['messageerror' => 'Error al recuperar el último número del comprobante '. $e->getMessage()]);
        }
    }

}
