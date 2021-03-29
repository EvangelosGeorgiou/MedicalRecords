<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitHistoryRequest extends FormRequest
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
            'doc_name' => 'required',
            'doc_speciality_id' => 'required',
            'reason_of_visit' => 'required',
            'date' => 'required',
            'patient_id' => 'required'
        ];
    }
}
