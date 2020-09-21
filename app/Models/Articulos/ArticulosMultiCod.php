<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Articulos;
use App\ArticulosTipoBarra;

class ArticulosMultiCod extends Model{

    private $articulos;
    private $articulostipobarra;

    protected $table = 'mgartcodbar';
    protected $primaryKey = 'codid';
    public $timestamps = false;
    public $incrementing = false;
    //protected $KeyType = 'string';

    public static function nuevoCodigo($idarticulo,$codigobarra,$descripcionalt,$cantidad){

        //creo mi nuevo codigobarra
        $codigomulti = New ArticulosMultiCod;
        //traigo el articulo
        $articulo = Articulos::getArticulo($idarticulo);
        //creo las variables que validan el codigo de barras *codbarunico* *controlcodbarras* *tipo de codigo*
        $codbarraunico = $articulo->artcodbarun;
        $codigocontrol = $articulo->artcodcont;
        $tipocodigo = $articulo->arttipcodbar;
        $codificacionbarra = ArticulosTipoBarra::getCode($tipocodigo);

        //tengo los datos, ahora valido si el codigo de barras valida el codigo
        if($codbarraunico !=null){
            return (['messageerror' => 'Error al grabar el nuevo código. No se puede tener asignado un código de barras en el ABM de artículos, por favor, borrelo para poder grabar múltiples códigos de barras.']);
        }else if($codbarraunico == null && $codigocontrol == 1){
            $resultado = Articulos::validatorCodBar($codificacionbarra->codtabr ,$codigobarra);
                //detengo la ejecucion si falla la validacion
                if($resultado == false){
                    return (['messageerror' => 'Error al grabar el nuevo código. El código de barra es inválido']);
                }
                try{
                    $codigomulti->codart = $articulo->artcod;
                    $codigomulti->codcod =$codigobarra;
                    $codigomulti->coddescalt = $descripcionalt;
                    $codigomulti->codcant = $cantidad;
                    $codigomulti->save();
                    return (['message' => 'Exito al grabar el nuevo código.'. $codigomulti->codcod]);
                }catch(\Exception $e){
                    return (['messageerror' => 'Error al grabar el nuevo código. El código de barra es inválido'.$e->getMessage()]);
                }
        }else{
            //patee todo lo que podia fallar, grabo directamente porque los otros if me dijeron que podia
            try{
                $codigomulti->codart = $articulo->artcod;
                $codigomulti->codcod =$codigobarra;
                $codigomulti->coddescalt = $descripcionalt;
                $codigomulti->codcant = $cantidad;
                $codigomulti->save();
                return (['message' => 'Exito al grabar el nuevo código.'. $codigomulti->codcod]);
            }catch(\Exception $e){
                return (['messageerror' => 'Error al grabar el nuevo código. El código de barra es inválido'.$e->getMessage()]);
            }
        }
    }

    public static function getCodArt($artid){
        $codigos = ArticulosMultiCod::where( 'codart', '=',$artid)->get();
        if($codigos->isEmpty()){
            return (['message' => 'No hay información para mostrar']);
        }else{
            return $codigos;
        }
    }

    public static function deleteCodArt($codid){
        try{
            $codigo = ArticulosMultiCod::find($codid);
            $codigo->delete();
            return (['message' => 'Se ha eliminado satisfactoriamente el código.']);
        }catch(\Exception $e){
            return (['messageerror' => 'Error en la transacción:' .$e->getMessage()]);
        }
    }
}
