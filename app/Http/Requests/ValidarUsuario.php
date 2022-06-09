<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarUsuario extends FormRequest
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
        if ($this->route('id')) {
            return [

                'usuario' => 'required|between:5,10|unique:usuarios,usuario,' . $this->route('id'),
                'nombre' => 'required|max:50|unique:usuarios,nombre,' . $this->route('id'),
                'password' => 'nullable|between:6,20',
                're_password' => 'nullable|required_with:password|same:password',
                'rol_id' => 'required|array'
                
            ];
        } else {
            return [

                'usuario' => 'required|between:5,10|unique:usuarios,usuario,' . $this->route('id'),
                'nombre' => 'required|max:50|unique:usuarios,nombre,' . $this->route('id'),
                'password' => 'required|between:6,20',
                're_password' => 'required|same:password',
                'rol_id' => 'required|array'
                
            ];
        }
    }

    public function messages()
    {
        return [
            'usuario.required' => 'el campo Usuario es requerido',
            'usuario.between' => 'el campo Usuario debe ser minimo a 5 caracteres',
            'usuario.unique' => 'el campo Usuario ya ha sido usado',
            'nombre.required' => 'el campo Nombre es requerido',
            'nombre.unique' => 'el campo Nombre ya ha sido usado',
            'password.required' => 'el campo Password es requerido',
            'password.between' => 'el campo Password debe ser minimo a 6 caracteres',
            're_password.required' => 'el campo Repetir Password es requerido',
            're_password.same' => 'el campo Repetir Password debe ser mismo que el campo Password',
            'rol_id.required' => 'el campo Rol es requerido',

        ];
    }
}
