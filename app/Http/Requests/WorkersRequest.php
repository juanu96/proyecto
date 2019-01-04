<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkersRequest extends FormRequest
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
            'nombre'=>'required|max:255',
            'dirección'=>'required|max:255',
            'cédula'=>'required|max:255',
            'inss'=>'required|max:255',
            'estado_civil'=>'required|max:255',
            'departamento'=>'required|numeric|max:11',
            'fecha_de_registro'=>'required|date_format:d/m/Y',
            'cumpleaños'=>'required|date_format:d/m/Y',
            'viatico'=>'required|between:0,9999999.99',
            'hijos/as'=>'required|numeric|max:11',
            'nivel_academico'=>'required|max:255',
            'profesión'=>'required|max:255',
            'puesto_laboral'=>'required|numeric|max:10',
            'vacaciones'=>'between:0,99999.99',
        ];
    }
}
