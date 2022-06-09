<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarPermiso extends FormRequest
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
            'nombre' => 'required|max:50|unique:permisos,nombre,' . $this->route('id'),
            'slug' => 'required|max:50|unique:permisos,slug,' . $this->route('id'),
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'el campo Nombre es requerido',
            'nombre.unique' => 'el campo Nombre ya ha sido usado',
            'slug.required' => 'el campo Slug es requerido',
            'slug.unique' => 'el campo Slug ya ha sido usado',
        ];
    }
}
