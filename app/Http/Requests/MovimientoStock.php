<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovimientoStock extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                 //cabecera
        /* "tipmovstk"
        "deposito"
        "cememisor"
        "numcom"
        "fecmov"
        //proveedor
        "proveedor"
        "cempro"
        "numcompro"
        "feccompro"
        //movim entre deposito
        "depori"
        "depdes"
        "cemprop"
        "compint"
        "fecmovint"
        // helpers
        "codartstk"
        "codcantstk"
        "codprecstk"
        //comrpobante detalle
        "tabladatos" */
        ];
    }
}
