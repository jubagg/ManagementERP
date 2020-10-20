<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller
{

    private $usuarios;

    public function __construct(User $usuarios){
        $this->usuarios = $usuarios;
    }

    public function guardarUsuario(Request $request){

        $rules = [
            'name' => 'required',
            'user' => 'required|unique:users,user',
            'password' => 'required',
            'email' => 'required|unique:users',
            'role' => 'required'];

        $messages =[
            'name.required' => 'Debe ingresar un nombre',
            'user.required' => 'Debe ingresar un nombre de usuario',
            'password.required' => 'Debe ingresar una contraseña',
            'email.required' => 'Debe ingresar un correo',
            'role.required' => 'Debe ingresar un rol para el usuario',
            'user.unique' => 'Este nombre de usuario ya existe',
            'email.unique' => 'Este correo ya existe',
        ];

            $validate = Validator::make($request->all(),$rules,$messages);

            if ($validate->fails()) {
                $variables = [];
                $variables = array_merge($variables, ['valortab' => 'usuarios']);
                $variables = array_merge($variables, ['messageinfo' => 'Debe completar todos los campos solicitados']);

                return redirect()->route('tablas')->with($variables)->withErrors($validate)->withInput();
            }

            $datos = \Funciones::limpiarRequest($request->all());
            $limpios = $this->usuarios::crear_modificar($datos);

            $val = \Funciones::validaciones($limpios);
            $val = array_merge($val, ['valortab' => 'usuarios']);
            return redirect()->route('tablas')->with($val);

        }
}
