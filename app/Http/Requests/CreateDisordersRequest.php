<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDisordersRequest extends FormRequest
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
            'icd_code_id'  => 'required' ,
            'description'  => 'required' ,
            'date'  => 'required' ,
            'body_part_id' => 'required',
            'patient_id'  => 'required'
        ];
    }
}