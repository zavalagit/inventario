<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarCampoUrl;


class ValidacionMenu extends FormRequest
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
            'titulo' => 'required|max:50|unique:menus,titulo,' . $this->route('id'),
            'url' => ['required', 'max:100', new ValidarCampoUrl],
            'icono' => 'nullable|max:50'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'el campo Titulo es requerido',
            'titulo.unique' => 'el campo Titulo ya ha sido usado',
            'url.required'  => 'el campo url es requerido',
        ];
    }
}
