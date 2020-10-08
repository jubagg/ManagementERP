<?php

namespace App\Http\Middleware;
use App\Estaciones;

use Closure;

class CheckStacion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $estacion = \Funciones::sesionEstacion();
        $result = Estaciones::getEstacion($estacion);
        if(!empty($result)){
            if($result->estnomred == $estacion){
                return $next($request);
            }else{
                abort(403, "Esta estación de trabajo(". $estacion.") no esta autorizada para realizar operaciones.");
            }
        }else{
                abort(403, "Esta estación de trabajo (". $estacion.") no esta autorizada para realizar operaciones.");
            }
        }

    }

