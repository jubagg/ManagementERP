<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\TryCatch;

class Cliente extends Model
{
    protected $table = 'mgcli';
    public $timestamps = false;
    protected  $primaryKey = 'clicodsis';

    public static function getCliente($id){
        try{
            $cli = Cliente::find($id);
        }catch(\Exception $e){
            return redirect()->route('clientes.modificar',$id)->with([
                'messageerror' => 'Error al recuperar el cliente: ' .$e->getMessage() .' Se anulo la transacción'
            ]);
        }
        return $cli;
    }

    public static function getAll(){
        try{
            $cli = Cliente::where('clisiscod', '=' , 1)->get();
        }catch(\Exception $e){
            return redirect()->route('clientes.listado')->with([
                'messageerror' => 'Error al recuperar el cliente: ' .$e->getMessage() .' Se anulo la transacción'
            ]);
        }
        return $cli;
    }

    public static function search($search = null){
        if(!empty($search)){
            try {
                $cli = Cliente::where([['clicodsis', 'LIKE','%'.$search.'%'],['clisiscod', '=', 1]])
                ->orWhere([['clifantasia', 'LIKE', '%'.$search.'%'],['clisiscod', '=', 1]])
                ->orWhere([['clirazons', 'LIKE', '%'.$search.'$'],['clisiscod', '=', 1]])
                ->orWhere([['clicuit', '=', '%'.$search.'$'],['clisiscod', '=', 1]])
                ->get();
                $cli = json_encode($cli);
            } catch (\Throwable $th) {
                return response()->json(['error'=>'Error: ' . $th],200);
            }
            return $cli;
            }else{
            return response()-json(['success' => 'Nada para hacer'], 200);
            }
        }
    }
