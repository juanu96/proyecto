<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Contact_emailRequest extends FormRequest
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
            "email" => "required|max:255|email"
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Debes agregar un email.',
            'email.max' => 'Te has pasado de caracteres, solo 255.',
            'email.email' => 'No es un formato de email valido',
            'email.unique' => 'Este email ya existe'
            
        ];
    }
}
