<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estaciones;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'estacion' ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $sesion = \Funciones::sesionEstacion();

        $result = Estaciones::getEstacion($sesion);

        return view('home')->with(compact('sesion', 'result'));




    }
}
