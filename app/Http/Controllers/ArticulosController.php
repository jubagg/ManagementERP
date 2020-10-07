<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulos;
use App\ArticulosFamilia;
use App\ArticulosSubfamilia;
use App\ArticulosMarca;
use App\ArticulosTipoBarra;
use App\ArticulosTipoMedida;
use App\IVA;
use App\UnidadesNegocio;
use App\Http\Requests\RequestArticulos;



class ArticulosController extends Controller{

    private $articulos;
    private $articulosfamilia;
    private $articulosmarca;
    private $articulossubfamilia;
    private $articulostipomedida;
    private $articulostipobarra;
    private $iva;
    private $unidadesnegocio;

    public function __construct(
        Articulos $articulos,
        ArticulosFamilia $articulosfamilia,
        ArticulosSubfamilia $articulossubfamilia,
        ArticulosMarca $articulosmarca,
        ArticulosTipoBarra $articulostipobarra,
        ArticulosTipoMedida $articulostipomedida,
        UnidadesNegocio $unidadesnegocio,
        IVA $iva){
            $this->articulos = $articulos;
            $this->articulosfamilia = $articulosfamilia;
            $this->articulossubfamilia = $articulossubfamilia;
            $this->articulosmarca = $articulosmarca;
            $this->articulostipobarra = $articulostipobarra;
            $this->articulostipomedida =$articulostipomedida;
            $this->unidadesnegocio = $unidadesnegocio;
            $this->iva = $iva;
    }

    public function crear_modificar($articuloid = null){

        $familia = $this->articulosfamilia::getAll();
        $marca =$this->articulosmarca::getAll();
        $subfamilia = $this->articulossubfamilia::getAll();
        $tipomedida = $this->articulostipomedida::getAll();
        $tipobarra = $this->articulostipobarra::getAll();
        $iva = $this->iva::getAll();
        $unnegocio = $this->unidadesnegocio::getAll();

        if(!empty($articuloid)){

                //control de paginas
            $titulo = 'Modificar artículo';
            $menu = 'modificar_articulom';
            $slug = 'modificar_articulof';
            $header = 'modificar_articuloh';
            $icon = 'fas fa-edit';
            $htitulo = 'Artículos';
            $hmintit = 'Modificar artículo';
            $articulo = $this->articulos::getArticulo($articuloid);

            return view('articulos/modificar')->with(compact('titulo','menu','slug','header','icon', 'htitulo', 'hmintit','familia','marca','subfamilia','tipomedida','tipobarra','iva','unnegocio','articulo'));
        }else{
            $titulo = 'Crear artículo';
            $menu = 'crear_articulom';
            $slug = 'crear_articulof';
            $header = 'crear_articuloh';
            $icon = 'fas fa-box-open';
            $htitulo = 'Artículos';
            $hmintit = 'Nuevo artículo';

            return view('articulos/crear')->with(compact('titulo','menu','slug','header','icon', 'htitulo', 'hmintit','familia','marca','subfamilia','tipomedida','tipobarra','iva','unnegocio'));

        }
    }

    public function guardar_actualizar(RequestArticulos $request, $articuloid = null){

        //definiciones
        $articulo = $this->articulos;
        $controlcod = $request->input('artconbar');
        if($controlcod == 1){
            $controlcod = true;
        }else{
            $codcontrol = false;
        }

         $resultado = $articulo::crear_modificar(
            $request->input('action'),
            $request->input('artcodigo'),
            $request->input('artnombre'),
            $request->input('arttipcodbar'),
            $request->input('artcodbar'),
            $controlcod,
            $request->input('artfam'),
            $request->input('artsubfam'),
            $request->input('artmar'),
            $request->input('artunneg'),
            $request->input('artiva'),
            $request->input('artbonificacion'),
            $request->input('artfecbon'),
            $request->input('artcontabc'),
            $request->input('artcontabv'),
            $request->input('artfecalt'),
            $request->input('artinactive'),
            $request->input('artstkmed'),
            $request->input('artfrac'),
            $request->input('artnegativo'),
            $request->input('artlimminstk'),
            $request->input('artlimmaxstk'),
            $request->input('artnegativo')
        );

        $messageerror = null;
        $message = null;

            if(isset($resultado['messageerror']) && $resultado['action'] == 'modificar'){
                $messageerror = $resultado['messageerror'];
                return redirect()->route('articulos.modificar', $request->input('artcodigo'))->with([
                    'messageerror' => $messageerror
                ]);
            }elseif(isset($resultado['message']) && $resultado['action'] == 'modificar'){
                $message = ($resultado['message']);
                return redirect()->route('articulos.modificar', $request->input('artcodigo') )->with([
                    'message' => $message
            ]);
        };
        if(isset($resultado['messageerror']) && $resultado['action'] == 'crear'){
            $messageerror = $resultado['messageerror'];
            return redirect()->route('articulos.crear')->with([
                'messageerror' => $messageerror
            ]);
        }elseif(isset($resultado['message']) && $resultado['action'] == 'crear'){
            $message = ($resultado['message']);
            return redirect()->route('articulos.crear')->with([
                'message' => $message
            ]);
        };
    }

    public function listado(Request $request){
        $titulo = 'Listado articulos';
        $slug = 'listado_articulos';
        $icon = 'fas fa-list-ol';
        $header ='listado_articulosh';
        $menu = null;
        if(!$request->ajax()){
            $articulos = $this->articulos::getAll();
            return view('articulos/listado')->with(compact('articulos','titulo','slug','icon','header','menu'));
        }else{
            $articulos = $this->articulos::getAll();
            $articulos = json_encode($articulos);
            return $articulos;
        }
    }

    public function buscar($busqueda = null){
        if(!empty($busqueda)){
            $busqueda = $this->articulos::search($busqueda);
            return $busqueda;
        }
    }

    public function pruebas(Request $request){
        var_dump($request->all());

        $validator = $this->articulos::validatorCodBar('EAN13', $request->input('codigo'));
        echo $validator;
    }
}
