<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Contact_numberRequest extends FormRequest
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
            "number" => "required|max:99999999|min:10000000|numeric|unique:contact_numbers,number"
        ];
    }

    public function messages()
    {
        return [
            'number.required' => 'Debes agregar un numero telefonico.',
            'number.max' => 'Te has pasado de caracteres, solo 8.',
            'number.min' => 'Te faltan caracteres, tiene que ser 8.',
            'number.numeric' => 'Solo puedes agregar numeros',
            'number.unique' => 'Este numero telefonico ya existe'
            
        ];
    }
}
