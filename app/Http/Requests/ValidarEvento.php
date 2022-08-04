<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarEvento extends FormRequest
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
        

                $reglas = [
                    'stock' => 'required',
                    
                ];

                $tipo = $this->request->get('tipo');

            if($tipo == 'entrega'){

                //dd(count($this->request->get('id_producto'))); 
                for ($i=0; $i < count($this->request->get('id_producto')); $i++) {
                    //dd($this->request->get('producto_estock'));

                    if($this->request->get('stock')[$i] > $this->request->get('producto_estock')[$i]){
                        //dd('es mayor');
                        $reglas['stock'] = "min:100";
                        
                    }

                }
                
                
            }

            return $reglas;

    }

    public function messages()
    {
        return [
            'stock.min' => 'el capo stock es mayor el almacenado',
        ];
    }
}
