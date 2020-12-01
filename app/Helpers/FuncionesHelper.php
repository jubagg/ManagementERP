<?php

namespace App\Helpers;
use App\Funciones;
use Illuminate\Database\Eloquent\Model;
use Afip;
use Illuminate\support\Facades\Storage;

class FuncionesHelper{

    public static function generateId($tipoc, $tipomov, $cenem, $compn, $idcli){
        $dia = date('d');
        $mes = date('m');
        $year = date('Y');
        $tipoc= str_pad($tipoc, 2, "0", STR_PAD_LEFT);
        $tipomov = str_pad($tipomov, 2, "0", STR_PAD_LEFT);
        $cenem = str_pad($cenem, 4, "0", STR_PAD_LEFT);
        $compn = str_pad($compn, 8, "0", STR_PAD_LEFT);
        $idcli = str_pad($idcli, 5, "0", STR_PAD_LEFT);
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

        public static function getSession(){
            $nombre_host = null;
            $nombre_host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $estacion = session($nombre_host);
            return $estacion;
        }

        public static function validaciones($valid = [] ){
            $messageerror = null;
            $message = null;
            if(isset($valid['messageerror'])){
                $messageerror = $valid['messageerror'];
                return (['messageerror' => $messageerror]);
            }elseif(isset($valid['message'])){
                $message = ($valid['message']);
                return(['message' => $message]);
            };
        }

        public static function mysqlConReport(){
            return [
                'driver' => 'mysql', //mysql, ....
                'username' => 'root',
                'password' => 'root01',
                'host' => 'localhost',
                'database' => 'managementerp',
                'port' => '3306'];
        }


        ///////////FACTURA ELECTRONICA
        public static function pruebasAFIP(){
            $cert = 'cert.crt';
            $key = 'key.key';
            $afip = new Afip(array('CUIT' => 20370560596,'cert' => $cert, 'key' => $key ,'production' => false));
            $voucher_types = $afip->ElectronicBilling->GetVoucherTypes();
            $last_voucher = $afip->ElectronicBilling->GetLastVoucher(1,1);
            $voucher_info = $afip->ElectronicBilling->GetVoucherInfo(1,1,6);
            $aloquot_types = $afip->ElectronicBilling->GetAliquotTypes();
            return $aloquot_types;
        }
        ///////////FIN FACTURA ELECTRONICA

        public static function getReportes(){
            $input = Storage::disk('reports')->files();
            //$input = json_encode($input);
            return $input;
        }
}
