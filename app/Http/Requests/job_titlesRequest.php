<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class job_titlesRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'salary' => 'required|numeric|between:1,9999999.99',
            'work_area_id' => 'required|numeric|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Debes agregar el nombre de el puesto de trabajo',
            'name.max' => 'Te has pasado de caracteres, solo 255',
            'description.required' => 'Describe brevemente el puesto de trabajo',
            'description.max' => 'Te has pasado de caracteres, solo 255',
            'salary.required' => 'Debes agregar el monto salarial',
            'salary.numeric' => 'El monto salarial no debe contener letras',
            'salary.between' => 'El monto salarial debe ser mayor a 0 y menor que 9999999.99',
            'work_area_id.required' => 'Debe de seleccionar una area de trabajo'
        ];
    }
}
