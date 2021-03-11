<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObstetricRequest extends FormRequest
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
            'doctor_name' => 'required',
            'type' => 'required',
            'childrens' => 'required',
            'number_of_childer' => 'required',
            'complications' => 'required',
            'date' => 'required',
            'patient_id' => 'required'
        ];
    }
}
