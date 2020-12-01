<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\ArticulosTipoBarra;
use App\ArticulosMultiCod;
use App\StockDetalle;
use App\Models\Stock\TiposMovimSt;

class Articulos extends Model{

    protected $table = 'mgart';
    protected $primaryKey = 'artcod';
    public $timestamps = false;
    private $articulotipobarra;

    public static function getAll(){
        $datos = Articulos::All();
        return $datos;
    }

    public static function validatorCodBar($tipcodbar, $codbar){
        $codbarsc = 0;
        $control = 0;
        $codfinal = 0;

        if($tipcodbar == 'EAN13'){
            $codbarsc = substr($codbar, 0, -1);
            $control = substr($codbar, -1);
            $checksum = 0;
            foreach (str_split(strrev($codbarsc)) as $pos => $val) {
                $checksum += $val * (3 - 2 * ($pos % 2));
            }
            $codfinal =  ((10 - ($checksum % 10)) % 10);
            if($codfinal == $control){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }

    public static function crear_modificar(
        $action, $codigo, $descripcion, $tipocodigo, $codigobarra, $codigocontrol, $familia,
        $subfamilia, $marca, $unegocio, $iva, $bonificacion, $fecbonificacion, $contablec, $contablev,
        $fcreacion, $inactive, $unmedida, $fraccion, $controlstk, $limminstk, $limmaxstk,
        $stknegativo){
            //creo nuevo articulo
            $articulo = New Articulos();
            //controles de procesos
            $codificacion = ArticulosTipoBarra::getCode($tipocodigo);
            //validaciones
        if($action == 'crear'){
            //si tengo validacion para codigo de barra voy aca
            if($codigobarra != null && $codigocontrol == true){
                $resultado = $articulo->validatorCodBar($codificacion->codtabr ,$codigobarra);
                //detengo la ejecucion si falla la validacion
                if($resultado == false){
                    return (['messageerror' => 'Error al grabar el nuevo arículo. El código de barra es inválido', 'action' => 'crear']);
                }
                //si todo sale bien sigo
                try{
                    $articulo->artcod = $codigo;
                    $articulo->artdesc = $descripcion;
                    $articulo->arttipcodbar = $tipocodigo;
                    $articulo->artcodbarun = $codigobarra;
                    $articulo->artcodcont = $codigocontrol;
                    $articulo->artfam = $familia;
                    $articulo->artsubfam = $subfamilia;
                    $articulo->artmarca = $marca;
                    $articulo->artunneg = $unegocio;
                    $articulo->artiva = $iva;
                    $articulo->artbonf = $bonificacion;
                    $articulo->artfecdes = $fecbonificacion;
                    $articulo->artcontabc = $contablec;
                    $articulo->artcontabv = $contablev;
                    $articulo->artfeccre = date("Y-m-d H:i:s");
                    if($inactive != null){
                    $articulo->artfecmod = date("Y-m-d H:i:s");
                    $articulo->artfecdes = date("Y-m-d H:i:s");
                    $articulo->artinactive = 1;
                    }else{
                        $articulo->artfecmod = null;
                        $articulo->artfecdes = null;
                        $articulo->artinactive = 0 ;
                    }
                    $articulo->artunmed = $unmedida;
                    if($fraccion != null){
                        $articulo->artfraccion = 1;
                    }else{
                        $articulo->artfraccion = 0;
                    }
                    if($controlstk != null){
                        $articulo->artcontrolstk = 1;
                    }else{
                        $articulo->artcontrolstk = 0;
                    }
                    $articulo->artlimminstk = $limminstk;
                    $articulo->artlimmaxstk = $limmaxstk;
                    if($stknegativo != null){
                        $articulo->artneg = 1;
                    }else{
                        $articulo->artneg = 0;
                    }
                    $articulo->save();
                    return (['message' => 'Exito al grabar el nuevo arículo: '.$articulo->artdesc, 'action' => 'crear']);
                }catch(\Exception $e){
                    return (['messageerror' => 'Error al grabar el nuevo arículo: '.$e->getMessage(), 'action' => 'crear']);
                }
                //si novalido codigo grabo directamente
            }else{

                try{
                    $articulo->artcod = $codigo;
                    $articulo->artdesc = $descripcion;
                    $articulo->arttipcodbar = $tipocodigo;
                    $articulo->artcodbarun = $codigobarra;
                    $articulo->artcodcont = $codigocontrol;
                    $articulo->artfam = $familia;
                    $articulo->artsubfam = $subfamilia;
                    $articulo->artmarca = $marca;
                    $articulo->artunneg = $unegocio;
                    $articulo->artiva = $iva;
                    $articulo->artbonf = $bonificacion;
                    $articulo->artfecdes = $fecbonificacion;
                    $articulo->artcontabc = $contablec;
                    $articulo->artcontabv = $contablev;
                    $articulo->artfeccre = date("Y-m-d H:i:s");
                    if($inactive != null){
                    $articulo->artfecmod = date("Y-m-d H:i:s");
                    $articulo->artfecdes = date("Y-m-d H:i:s");
                    $articulo->artinactive = 1;
                    }else{
                        $articulo->artfecmod = null;
                        $articulo->artfecdes = null;
                        $articulo->artinactive = 0 ;
                    }
                    $articulo->artunmed = $unmedida;
                    if($fraccion != null){
                        $articulo->artfraccion = 1;
                    }else{
                        $articulo->artfraccion = 0;
                    }
                    if($controlstk != null){
                        $articulo->artcontrolstk = 1;
                    }else{
                        $articulo->artcontrolstk = 0;
                    }
                    $articulo->artlimminstk = $limminstk;
                    $articulo->artlimmaxstk = $limmaxstk;
                    if($stknegativo != null){
                        $articulo->artneg = 1;
                    }else{
                        $articulo->artneg = 0;
                    }
                    $articulo->save();
                    return (['message' => 'Exito al grabar el nuevo arículo: '.$articulo->artdesc, 'action' => 'crear']);
                }catch(\Exception $e){
                    return (['messageerror' => 'Error al grabar el nuevo arículo: '.$e->getMessage(), 'action' => 'crear']);
                }
            }
        }else if($action == 'modificar'){
            if($codigobarra != null && $codigocontrol == 1){
                $resultado = $articulo->validatorCodBar($codificacion->codtabr ,$codigobarra);
                //detengo la ejecucion si falla la validacion
                if($resultado == false){
                    return (['messageerror' => 'Error al  modificar el arículo. El código de barra es inválido', 'action' => 'modificar']);
                }
                //si todo sale bien sigo
                try{

                    $articulo = Articulos::getArticulo($codigo);
                    $articulo->artdesc = $descripcion;
                    $articulo->arttipcodbar = $tipocodigo;
                    $articulo->artcodbarun = $codigobarra;
                    $articulo->artcodcont = $codigocontrol;
                    $articulo->artfam = $familia;
                    $articulo->artsubfam = $subfamilia;
                    $articulo->artmarca = $marca;
                    $articulo->artunneg = $unegocio;
                    $articulo->artiva = $iva;
                    $articulo->artbonf = $bonificacion;
                    $articulo->artfecdes = $fecbonificacion;
                    $articulo->artcontabc = $contablec;
                    $articulo->artcontabv = $contablev;
                    $articulo->artfecmod = date("Y-m-d H:i:s");
                    if($inactive != null){
                    $articulo->artfecdes = date("Y-m-d H:i:s");
                    $articulo->artinactive = 1;
                    }else{
                        $articulo->artinactive = 0 ;
                    }
                    $articulo->artunmed = $unmedida;
                    if($fraccion != null){
                        $articulo->artfraccion = 1;
                    }else{
                        $articulo->artfraccion = 0;
                    }
                    if($controlstk != null){
                        $articulo->artcontrolstk = 1;
                    }else{
                        $articulo->artcontrolstk = 0;
                    }
                    $articulo->artlimminstk = $limminstk;
                    $articulo->artlimmaxstk = $limmaxstk;
                    if($stknegativo != null){
                        $articulo->artneg = 1;
                    }else{
                        $articulo->artneg = 0;
                    }
                    $articulo->update();
                    return (['message' => 'Exito al modificar el arículo: '.$articulo->artdesc , 'action' => 'modificar']);
                }catch(\Exception $e){
                    return (['messageerror' => 'Error al modificar el arículo: '.$e->getMessage(), 'action' => 'modificar']);
                }
                //si novalido codigo grabo directamente
            }else{
                try{
                    $articulo = Articulos::getArticulo($codigo);
                    $articulo->artdesc = $descripcion;
                    $articulo->arttipcodbar = $tipocodigo;
                    $articulo->artcodbarun = $codigobarra;
                    $articulo->artcodcont = $codigocontrol;
                    $articulo->artfam = $familia;
                    $articulo->artsubfam = $subfamilia;
                    $articulo->artmarca = $marca;
                    $articulo->artunneg = $unegocio;
                    $articulo->artiva = $iva;
                    $articulo->artbonf = $bonificacion;
                    $articulo->artfecdes = $fecbonificacion;
                    $articulo->artcontabc = $contablec;
                    $articulo->artcontabv = $contablev;
                    $articulo->artfecmod = date("Y-m-d H:i:s");
                    if($inactive != null){
                    $articulo->artfecdes = date("Y-m-d H:i:s");
                    $articulo->artinactive = 1;
                    }else{
                        $articulo->artinactive = 0 ;
                    }
                    $articulo->artunmed = $unmedida;
                    if($fraccion != null){
                        $articulo->artfraccion = 1;
                    }else{
                        $articulo->artfraccion = 0;
                    }
                    if($controlstk != null){
                        $articulo->artcontrolstk = 1;
                    }else{
                        $articulo->artcontrolstk = 0;
                    }
                    $articulo->artlimminstk = $limminstk;
                    $articulo->artlimmaxstk = $limmaxstk;
                    if($stknegativo != null){
                        $articulo->artneg = 1;
                    }else{
                        $articulo->artneg = 0;
                    }
                    $articulo->update();
                    return (['message' => 'Exito al modificar el arículo: '.$articulo->artdesc, 'action' => 'modificar']);
                }catch(\Exception $e){
                    return (['messageerror' => 'Error al modificar arículo: '.$e->getMessage(), 'action' => 'modificar']);
                }
            }
        }
    }

    public static function search($search = null){
        if(!empty($search)){
            try {
                $cli = Articulos::where('artcod', 'LIKE', '%'.$search.'%')
                ->orWhere('artdesc', 'LIKE','%'.$search.'%')
                ->get();
                $cli = json_encode($cli);
            } catch (\Throwable $th) {
                return response()->json(['error'=>'Error: ' . $th],200);
            }
                return $cli;
            }else{
                return response()->json(['success' => 'Nada para hacer'], 200);
            }
    }

    public static function getArticulo($id){
        try{
            //miro si el articulo vino por el codigo dle articulo,
            $art = Articulos::join('mgarttipmed','mgart.artunmed', '=','mgarttipmed.tmid')->where('mgart.artcod', '=' , $id)->first();
            //si el articulo no viene por el id del mismo busco por el codigo de barra uniico, si tiene algo retorno
            if($art == null){
                $art = Articulos::join('mgarttipmed','mgart.artunmed', '=','mgarttipmed.tmid')->where('mgart.artcodbarun', '=' , $id)->first();
                if($art != null){
                    return $art;
                }
            //si no localiza por codigo de barra, busco por el codigo mutlicod y lo retorno si existe algo
            }if($art == null){
                $art = ArticulosMultiCod::join('mgart', 'mgart.artcod', '=' , 'mgartcodbar.codart')
                                                        ->join('mgarttipmed','mgart.artunmed', '=','mgarttipmed.tmid')
                                                        ->where('mgartcodbar.codcod', '=',$id)
                                                        ->first();
                //$art = Articulos::find($art->codart);
                if($art != null){
                    return $art;
                }
                //si no lo busco por nombre y retorno un div con muestra
            }if($art == null){
                //$art = Articulos::join('mgarttipmed','mgart.artunmed', '=','mgarttipmed.tmid')->where('mgart.artdesc', 'like' , '%'.$id .'%')->get();
                $art = ArticulosMultiCod::join('mgart', 'mgart.artcod', '=' , 'mgartcodbar.codart')
                                                    ->join('mgarttipmed','mgart.artunmed', '=','mgarttipmed.tmid')
                                                    ->where('mgart.artdesc', 'like' , '%'.$id .'%')
                                                    ->orWhere('mgartcodbar.coddescalt', 'like','%'.$id.'%')
                                                    ->get();
                if($art != null){
                    return $art;
                }
            }if($art == null){
                $art = ArticulosMultiCod::join('mgart', 'mgart.artcod', '=' , 'mgartcodbar.codart')
                                                    ->join('mgarttipmed','mgart.artunmed', '=','mgarttipmed.tmid')
                                                    ->where('mgartcodbar.coddescalt', 'like','%'.$id.'%')
                                                    ->get();
                if($art != null){
                    return $art;
                }

        }

        }catch(\Exception $e){
            return redirect()->route('articulos.modificar',$id)->with([
                'messageerror' => 'Error al recuperar el artículo: ' .$e->getMessage() .' Se anulo la transacción'
            ]);
        }
        return $art;
    }

    static public function controlNegativos($articulo, $tipoMovimiento,$cantidad,$fecha,$deposito){
        try{
            $articulo = Articulos::getArticulo($articulo);
            $validador = $articulo->artcontrolstk;
            $resultado = null;
            $saldofinal = null;
            if($validador == 1){
                $saldo = StockDetalle::detalleArtStock($articulo->artcod,$fecha,$deposito);

                if($saldo == null){
                    $saldofinal = 0;
                }else{
                    $saldofinal = $saldo;
                }
                $tipoMovimiento = TiposMovimSt::getTipoMov($tipoMovimiento);
                if($tipoMovimiento->movtipmov == 2){
                    $resultado = $saldofinal - $cantidad;
                }elseif($tipoMovimiento->movtipmov == 1){
                    $resultado = $saldofinal + $cantidad;
                }elseif($tipoMovimiento->movtipmov == 3){
                    $resultado = $saldofinal - $cantidad;
                }
                if($resultado < 0){
                    return response()->json(['error' => 'Error. El artículo tiene control negativo y lo esta sobrepasando.  Cantidad: ' . $resultado ], 200);
                }else{
                    return response()->json(['success' => 'Nada para hacer'], 200);
                }

            }else{
                return response()->json(['success' => 'Nada para hacer'], 200);
            }
        }catch(\Exception $e){
            return response()->json(['error'=>'Error: ' . $e]);
        }
    }

    public static function artPrecios(){
/*         $listado = DB::select('select idart, artdes, codbar ,cant
        from(
        select a.artcod as idart, a.artdesc as artdes, a.artcodbarun as codbar, m.tmdesc as cant
        from managementerp.mgart as a
        inner join managementerp.mgarttipmed m
        where a.artunmed = m.tmid
        UNION ALL
        select c.codart as idart, c.coddescalt as artdes, c.codcod as codbar, c.codcant as cant
        from managementerp.mgartcodbar as c
        )articulos'); */

        $listado = DB::select('	select idart, artdes, codbar ,cant
            from(
            select a.artcod as idart, a.artdesc as artdes, a.artcodbarun as codbar, m.tmdesc as cant
            from managementerp.mgart as a
            inner join managementerp.mgarttipmed m
            where a.artunmed = m.tmid )
            articulos');

return $listado;
    }
}
