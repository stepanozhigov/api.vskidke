<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeUpdateRequest extends FormRequest
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
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'birthday'=>'required|date_format:Y-m-d',
            'email'=>['required','string', Rule::unique('employees')->ignore($this->employee->id,'id')],
            'phone'=>['required','string', Rule::unique('employees')->ignore($this->employee->id,'id')],
        ];
    }
}
