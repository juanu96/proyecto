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
            'salary' => 'required|numeric|between:0,9999999.99',
            'work_area_id' => 'required|numeric|max:100',
        ];
    }
}
