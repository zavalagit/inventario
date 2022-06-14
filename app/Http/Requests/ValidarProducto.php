<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarProducto extends FormRequest
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
            'nombre' => 'required|max:250|unique:productos,nombre,' . $this->route('id'),
            
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'el campo Nombre es requerido',
            'nombre.unique' => 'el Nombre del producto ya ha sido usado',
        ];
    }
}
