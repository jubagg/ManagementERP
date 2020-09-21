<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\supports\facades\DB;
use App\Http\Requests\ValidarClienteRequest;
use App\Http\Requests\ValidarClienteRequestM;
use App\Cliente;
use App\TipoDocumento;
use App\Localidad;
use App\Provincia;
use App\Pais;
use App\Sucursales;
use App\Zonas;
use App\IVAResponsable;
use App\TipoCliente;
use App\IIBB;
use App\Ganancias;
use App\Ventascon;
use App\Bancos;
use App\CuentasBancarias;

class ProveedoresController extends Controller
{
    private $cliente;
    private $localidad;
    private $ventascon;
    private $bancos;
    private $cuentasbancarias;

    public function __construct(Cliente $cliente, Localidad $localidad, Ventascon $ventascon, Bancos $bancos, CuentasBancarias $cuentasbancarias){
        $this->cliente = $cliente;
        $this->localidad = $localidad;
        $this->ventascon = $ventascon;
        $this->bancos = $bancos;
        $this->cuentasbancarias = $cuentasbancarias;
    }

    public function crear_modificar($clienteid = null){
       $documento = TipoDocumento::tipDoc();
       $localidad = Localidad::getLocalidades();
       $provincia = Provincia::getProvincias();
       $pais = Pais::getPais();
       $sucursal = Sucursales::getSucursal();
       $zonas = Zonas::getZonas();
       $iva = IVAResponsable::getIVA();
        $tipocliente = TipoCliente::getTipoCliente();
        $iibb = IIBB::getIIBB();
        $ganancias = Ganancias::getGanancias();
        $ventas = $this->ventascon::getVentas();
        $bancos = $this->bancos::getBancos();
        $listadob = $this->cuentasbancarias::listadoCuentasBancarias();

        //cargo la seccion de modificar si el id tiene algo, si no, cargo directamente el modulo de creacion
        if(!empty($clienteid)){
        //control de paginas
            $titulo = 'Modificar proveedor';
            $menu = 'modificar_proveedorm';
            $slug = 'modificar_proveedorf';
            $header = 'modificar_proveedorh';
            $icon = 'fas fa-user-edit';
            $a = '1.00';
            $cliente = $this->cliente::getCliente($clienteid);

            return view('clientes/modificar')->with(compact('documento','localidad','provincia','pais','sucursal','zonas','iva','tipocliente','iibb','ganancias','titulo', 'menu', 'slug','header','icon','a','clienteid','ventas', 'cliente','bancos','listadob'));
        }else{
        //control de paginas
            $titulo = 'Crear proveedor';
            $menu = 'crear_proveedorm';
            $slug = 'crear_proveedor';
            $header = 'crear_proveedorh';
            $icon = 'fas fa-user-plus';
            $a = '1.00';
            return view('clientes/crear')->with(compact('documento','localidad','provincia','pais','sucursal','zonas','iva','tipocliente','iibb','ganancias','titulo', 'menu', 'slug','header','icon','a','clienteid','ventas'));
        }

    }

    public function guardar_actualizar(ValidarClienteRequest  $request, $clienteid = null){

        $cliente = $this->cliente;
        $action = $request->input('action');
        if($action == 'crear'){
            try {
                $cliente->clicodsis = $request->input('codigo');
                $cliente->clifantasia = $request->input('nombre');
                $cliente->clirazons = $request->input('rsocial');
                $cliente->clicatdoc = $request->input('documento');
                $cliente->clicuit = $request->input('numdoc');
                $cliente->clidir = $request->input('dir');
                $cliente->clipais = $request->input('pais');
                $cliente->cliprov = $request->input('prov');
                $cliente->cliloc = $request->input('loc');
                $cliente->clicp = $request->input('cp');
                $cliente->clitel = $request->input('telefono');
                $cliente->cliweb = $request->input('web');
                $cliente->cliemail = $request->input('mail');
                $cliente->clisuc = $request->input('suc');
                $cliente->clizona = $request->input('zona');
                $cliente->clicatcli = $request->input('catcli');
                $cliente->clicatres = $request->input('responsable');
                $cliente->clicatiibb = $request->input('catiibb');
                $cliente->cliiibb = $request->input('iibb');
                $cliente->clicatgan = $request->input('catgan');
                $cliente->clilimcre = $request->input('limcred');
                $cliente->cliconven = $request->input('venta');
                $cliente->clidescue = $request->input('des');
                $cliente->clialta = date("Y-m-d H:i:s");
                //$cliente->climod = $request->input('dir');
                if($request->input('inactive') != NULL){
                $cliente->clidesac = 1;
                $cliente->clibaj = date("Y-m-d H:i:s");
                }else{
                    $cliente->clidesac = 0;
                }
                $cliente->cliobs = $request->input('obs');
                $cliente->save();
                return redirect()->route('clientes.crear')->with([
                    'message' => 'Exito al grabar el nuevo cliente: '.$cliente->clifantasia
                ]);
            } catch (\Exception $th) {
                return redirect()->route('clientes.crear')->with([
                    'messageerror' => 'Error al grabar el cliente: ' .$th->getMessage() .' Se anulo la transacción'
                ]);
            }
        }elseif($action == 'modificar'){
            $cliente = $this->cliente::getCliente($request->input('codigo'));

            try {

                $cliente->clifantasia = $request->input('nombre');
                $cliente->clirazons = $request->input('rsocial');
                $cliente->clicatdoc = $request->input('documento');
                $cliente->clicuit = $request->input('numdoc');
                $cliente->clidir = $request->input('dir');
                $cliente->clipais = $request->input('pais');
                $cliente->cliprov = $request->input('prov');
                $cliente->cliloc = $request->input('loc');
                $cliente->clicp = $request->input('cp');
                $cliente->clitel = $request->input('telefono');
                $cliente->cliweb = $request->input('web');
                $cliente->cliemail = $request->input('mail');
                $cliente->clisuc = $request->input('suc');
                $cliente->clizona = $request->input('zona');
                $cliente->clicatcli = $request->input('catcli');
                $cliente->clicatres = $request->input('responsable');
                $cliente->clicatiibb = $request->input('catiibb');
                $cliente->cliiibb = $request->input('iibb');
                $cliente->clicatgan = $request->input('catgan');
                $cliente->clilimcre = $request->input('limcred');
                $cliente->cliconven = $request->input('venta');
                $cliente->clidescue = $request->input('des');
                //$cliente->clialta = date("Y-m-d H:i:s");
                $cliente->climod = date("Y-m-d H:i:s");
                if($request->input('inactive') != NULL){
                $cliente->clidesac = 1;
                $cliente->clibaj = date("Y-m-d H:i:s");
                }else{
                    $cliente->clidesac = 0;
                    $cliente->clibaj = null;
                }
                $cliente->cliobs = $request->input('obs');
                $cliente->update();
                return redirect()->route('clientes.modificar',$request->input('codigo'))->with([
                    'message' => 'Exito al modificar el cliente: '.$cliente->clifantasia
                ]);
            } catch (\Exception $th) {
                return redirect()->route('clientes.modificar',$request->input('codigo'))->with([
                    'messageerror' => 'Error al modificar el cliente: ' .$th->getMessage() .' Se anulo la transacción'
                ]);
            }

        }
    }

    public function listado(Request $request){
        if(!$request->ajax()){
            $cliente = $this->cliente::getAll();
            return view('clientes/listado')->with(compact('cliente'));
        }else{
            $cliente = $this->cliente::getAll();
            $cliente = json_encode($cliente);
            return $cliente;
        }
    }

    public function buscar($busqueda = null){
        if(!empty($busqueda)){
        $busqueda = $this->cliente::search($busqueda);
        return $busqueda;
        }
    }
}
