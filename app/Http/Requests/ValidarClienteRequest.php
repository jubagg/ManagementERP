<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarClienteRequest extends FormRequest
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
                    'codigo'            =>'required|integer', //|unique:mgcli,clicodsis'
                    'nombre'           =>'required|min:1|max:200|regex:/^[\pL \s \-]+$/u',
                    'rsocial'             => 'required|min:1|max:200|regex:/^[\pL \s \-]+$/u',
                    'documento'      => 'required',
                    'numdoc'            => 'required|integer',
                    'mail'                  => 'required|email',
                    'suc'                    => 'required',
                    'zona'                  => 'required',
                    'catcli'                  => 'required',
                    'responsable'      => 'required',
                    'limcred'              => 'required|integer',
                    'venta'                 => 'required',
        ];
    }

    public function messages()
    {
        return [
            'codigo.required'   => 'El :attribute es requerido',
            'codigo.integer'     => 'El :attribute debe contener solo números',
            'codigo.unique'     => 'Ya existe el :attribute en el sistema',

            'nombre.requred'  => 'El :attribute es obligatorio',
            'nombre.min'        => 'El :attribute debe tener minimo 1 caracter',
            'nombre.max'       => 'El :attribute debe tener maximo 200 caracteres',
            'nombre.regex'     => 'El :attribute solo puede contener letras',

            'rsocial.required'     =>'La :attribute es obligatoria',
            'rsocial.min'       => 'La :attribute debe tener minimo 1 caracter',
            'rsocial.max'       => 'La :attribute debe tener maximo 200 caracteres',
            'rsocial.regex'     => 'La :attribute solo puede contener letras',

            'documento.required'     =>'El tipo de :attribute es requrido',

            'numdoc.required'     =>'El :attribute es requerido',
            'numdoc.integer'        =>'El :attribute solo puede contener números',

            'mail.required'     => 'El :attribute es requerido',
            'mail.email'         => 'El :attribute debe ser válido',

            'suc.required'     => 'La :attribute es requerido',

            'zona.required'     => 'La :attribute es requerido',

            'catcli.required'     => 'La :attribute es requerido',

            'responsable.required'     => 'El :attribute es requerido',

            'limcred.required'     => 'El :attribute es requerido',
            'limcred.integer'        =>'El :attribute solo puede contener números',

            'venta.required'     => 'El tipo de :attribute es requerido'

        ];
    }

    public function attributes()
    {
        return [
            'codigo'    => 'código',
            'nombre'    => 'nombre',
            'rsocial'                  => 'razón social',
            'documento' => 'tipo de documento',
            'numdoc'    => 'documento',
            'mail'                  => 'correo electrónico',
            'suc' => 'sucursal',
            'zona' => 'zona',
            'catcli' => 'categoria cliente',
            'responsable' => 'tipo de responsable',
            'limcred' => 'limite de crédito',
            'venta' => 'condición de venta'
        ];
    }
}
