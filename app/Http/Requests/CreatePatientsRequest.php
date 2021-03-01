<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePatientsRequest extends FormRequest
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
        'name' => 'required',
        'surname' =>'required',
        'email' => 'required|unique:patients',
        'nationality' => 'required',
        'dbo' => 'required',
        'gender' => 'required',
        'weight' => 'required',
        'height' => 'required',
        'status' => 'required',
        'telephone' => 'required',
        'identity_number' => 'required|unique:patients'
        ];
    }
}
