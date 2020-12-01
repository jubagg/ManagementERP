<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predeterminados extends Model
{
    protected $table = 'mgtabestpre';
    protected $primaryKey = 'idest';
    public $timestamps = false;
    protected $fillable = ['idest' ,'presuc' ,'precaja' ,'predeposito','preventa' ,'prelista','prepedidos' ,'preremitos','prefacta','prefactb','prendeba' ,'prendebb' ,'precreda' ,'precredb' ,'premovstk' ,'prepresu' ,'precobra' ,'preordcomp' ,'preordvta'];

    public static function guardarPred($datos = []){
//armo el try catch
try {

         $id = ['idest' => $datos['est']];
         $data =
         [
         'idest' => $datos['est'],
         'presuc' => $datos['suc'],
         'precaja' => $datos['caja'],
         'predeposito' => $datos['deposito'],
         'preventa' => $datos['venta'],
         'prelista' => $datos['listpre'],
         'prepedidos' => $datos['pedidos'],
         'preremitos' => $datos['remitos'],
         'prefacta' => $datos['facta'],
         'prefactb' => $datos['factb'],
         'prendeba' => $datos['ndeba'],
         'prendebb' => $datos['ndebb'],
         'precreda' => $datos['ncredb'],
         'precredb' => $datos['ncreda'],
         'premovstk' => $datos['movstk'],
         'prepresu' => $datos['presu'],
         'precobra' => $datos['cobranzas'],
         'preordcomp' => $datos['ordcom'],
         'preordvta' => $datos['ordvta'],
        ];

            $datos = Predeterminados::updateOrCreate($id,$data);
            return (['message' => 'Exito al grabar los valores predeterminados.'] );
        } catch (\Exception $e) {
            return (['messageerror' => 'No se ha agregado el registro.' . ' ' . $e->getMessage()]);
        }
    }

    public static function getPredeterminados($id){
        try{
            $datos = Predeterminados::where('idest', '=', $id)->get();
            return $datos;
        }catch(\Exception $e){
            return (['messageerror' => 'No se puede recuperar la información '. $e->getMessage()]);
        }
    }
}
