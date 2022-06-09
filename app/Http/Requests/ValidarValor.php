<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarValor extends FormRequest
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
            'folio' => 'required|max:50|unique:strs,folio,' . $this->route('id'),
        ];
    }

    public function messages()
    {
        return [
            'folio.required' => 'el campo Folio es requerido',
            'folio.unique' => 'el Folio ya ha sido usado',
        ];
    }
}
