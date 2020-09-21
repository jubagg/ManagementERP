<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestArticulos extends FormRequest
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
            'artcodigo' => 'required|integer',
            'artnombre' => 'required',
            'artunneg' => 'required',
            'artiva' => 'required',
            'artstkmed' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'artcodigo.required'     => 'El :attribute de artículo es requerido.',
            'artcodigo.integer'        => 'El :attribute debe contener solo números.',
            'artnombre.required' => 'El :attribute del artículo es requerido.',
            'artunneg.required'        => 'La :attribute es requerida',
            'artiva.required'        => 'El :attribute es requerido.',
            'artstkmed.required'        =>'La :attribute es requerida'
        ];
    }
    public function attributes()
    {
        return [
            'artcodigo' => 'código',
            'artnombre'                  => 'nombre',
            'artunneg' => 'unidad de negocio',
            'artiva' => 'I.V.A.',
            'artstkmed' => 'unidad de medida'
        ];
    }
}
