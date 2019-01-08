<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Work_areaRequest extends FormRequest
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
            'name'=>'required|max:255',
            'description'=>'required|max:255',
        ];
    }    

    public function messages()
    {
        return[
            'name.required' => 'Debes agregar el nombre de el area de trabajo',
            'name.max' => 'Te has pasado de caracteres, solo 255',
            'description.required' => 'Describe brevemente el area de trabajo',
            'description.max' => 'Te has pasado de caracteres, solo 255'
        ];
    }
}
