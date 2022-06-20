<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user() != null ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^[^\s]+(?=@hcmut.edu.vn)/'],
            'first_name' => 'required',
            'last_name' => 'required',
            'teacher_code' => 'required',
            'department' => 'required',
            'faculty' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ];
    }
}
