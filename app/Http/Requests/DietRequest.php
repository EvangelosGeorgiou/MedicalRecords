<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DietRequest extends FormRequest
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
            'description' => 'required',
            'start_date' => 'required',
            'finish_date' => 'required',
            'patient_id' => 'required',

        ];
    }
}
