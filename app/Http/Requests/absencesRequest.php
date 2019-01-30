<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class absencesRequest extends FormRequest
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
            'worker_id' => 'required|max:1000|numeric',
            'justified' => 'boolean',
            'quantity' => 'required|between:0,99999999.99',
            'observation' => 'required|max:300',
            'file' => 'file',
            'date' => 'required|date_format:d/m/Y'

            ];
    }

    public function messages()
    {
        return [
            'worker_id.required' => 'Debes seleccionar un trabajador.',
            'worker_idausencia.max' => 'El ID de el Trabajador es mayor a 1000.',
            'justified.boolean' => 'la falta debe o no estar marcada',
            'quantity.required' => 'La cantidad de horas son requeridas.',
            'quantity.between' => 'Te has pasado de caracteres, solo 99999999.99.',
            'observation.required' => 'Debes agregar un comentario.',
            'observation.max' => 'Te has pasado de caracteres, solo 300.',
            'file.file' => 'solo se permiten archivos',
            'date.required' => 'Debes ingresar la fecha',
            'date.date' => 'Debe ser una fecha'
        ];
    }
}
