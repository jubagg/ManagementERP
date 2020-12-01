<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPJasper\PHPJasper;
use Illuminate\support\Facades\Storage;
use Response;

class ReportesController extends Controller{

    private $input = null;
    private $output = null;
    private $options = null;
    private $img = null;

    public static function reportes($id, $valor){
//ruta para la imagen del logo
    $img= Storage::disk('img')->path('');
    $empresa = \Empresa::getEmpresa();
    $db = \Funciones::mysqlConReport();

    if($valor = 'clientedetalle'){
        //ruta del reporte
        $input = Storage::disk('reports')->path('gmclidet.jrxml');
        //ruta de salida del reporte
        $output = Storage::disk('process')->path('cli'.$id);
        //invocacion al objeto jasper
        $jasper = new PHPJasper;
        //compilacion del objeto
        $jasper->compile($input)->execute();
        //capturo el output anterior precesado
        $input = Storage::disk('reports')->path('gmclidet.jasper');
        //traigo el logo
        $logo = Storage::disk('img')->path('logo.png');

        //configuro las opciones(Exporto a pdf),(doy los parametros y demas)
        $parametros = [
        "titulo" => 'Cliente',
        "path" => $img,
        "empresa" =>  $empresa->empnom,
        "cuitempre" =>  $empresa->empcuit,
        "telempre" =>  $empresa->emptel,
        "correoempre"  =>  $empresa->empemail,
        "clicod" =>  $id];

        $options = [
            'format' => ['pdf'],
            'params' =>$parametros,
            'db_connection' => $db
        ];

        /* dd($jasper->process(
            $input,
            $output,
            $options
        )->output());
            */
         $jasper->process(
            $input,
            $output,
            $options
        )->execute();

        $input = null;
        $output = null;
        $options = null;

        $pathToFile = Storage::disk('process')->path('cli'.$id.'.pdf');
        return Response::make(file_get_contents($pathToFile),200,[
            'Content-Type' => 'application/pdf',
        ]);
    ///-----------REPORTE LISTADO-------------------/////
    }elseif($valor == 'listadoclientes'){
        //ruta del reporte
        $input = Storage::disk('reports')->path('gmclidet.jrxml');
        //ruta de salida del reporte
            $output = Storage::disk('process')->path('cli'.$id);
        //invocacion al objeto jasper
            $jasper = new PHPJasper;
        //compilacion del objeto
            $jasper->compile($input)->execute();

        //capturo el output anterior precesado
            $input = Storage::disk('reports')->path('gmclidet.jasper');
        //traigo el logo
            $logo = Storage::disk('img')->path('logo.png');

        //configuro las opciones(Exporto a pdf),(doy los parametros y demas)
        $parametros = [
        "titulo" => 'Listado Cliente',
        "path" => $img,
        "empresa" =>  $empresa->empnom,
        "cuitempre" =>  $empresa->empcuit,
        "telempre" =>  $empresa->emptel,
        "correoempre"  =>  $empresa->empemail,
        "clicod" =>  $id];

            $options = [
                'format' => ['pdf'],
                'params' =>$parametros,
                'db_connection' => $db
            ];


/*          dd($jasper->process(
            $input,
            $output,
            $options
        )->output());
 */
         $jasper->process(
            $input,
            $output,
            $options
        )->execute();

        $pathToFile = Storage::disk('process')->path('cli'.$id.'.pdf');
        return Response::make(file_get_contents($pathToFile),200,[
            'Content-Type' => 'application/pdf',
        ]);
    }

    }

    public static function getReportes(){
        $input = Storage::disk('reports')->files();
        //$input = json_encode($input);
        return $input;
    }
}
