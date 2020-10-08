<?php

namespace App\Helpers;
use App\Funciones;
use Illuminate\Database\Eloquent\Model;

class FuncionesHelper{



    public static function generateId($tipoc, $tipomov, $cenem, $compn, $idcli){
        $dia = date('d');
        $mes = date('m');
        $year = date('Y');
        $id = $tipoc.$tipomov.$cenem.$compn.$idcli.$dia.$mes.$year;
        return $id;
    }

    public static function limpiarRequest($array, $id= null){
        $arrayproc = [];
        foreach ($array as $key => $value) {
            if($key != '_token'){
                if($value == 'Seleccionar'){
                    $value = null;
                    $arrayproc = array_merge($arrayproc, $array = array($key => $value));
                }else{
                    $arrayproc = array_merge($arrayproc, $array = array($key => $value));
                }
            }
        }
        if($id != null){
            $arrayproc = array_merge($arrayproc, $array = array('id' => $id));
        };
        $arrayproc = array_merge($arrayproc, $array = array('fecha' => date("Y-m-d H:i:s")));
        return $arrayproc;
    }

        public static function sesionEstacion(){
            $nombre_host = null;
            $nombre_host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            session([$nombre_host => $nombre_host]);
            $estacion = session($nombre_host);
            return $estacion;
        }
}
