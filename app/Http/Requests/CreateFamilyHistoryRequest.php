<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFamilyHistoryRequest extends FormRequest
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
            'family_member_name' => 'required',
            'diagnosed_age' => 'required',
            'diagnosed_year' => 'required',
            'disease_name' => 'required',
            'family_side' => 'required',
            'patient_id' => 'required'
        ];
    }
}
