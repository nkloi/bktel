<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|email|unique:users|regex:/^[^\s]+(?=@hcmut.edu.vn)/',
            'password' => 'required|min:8',
            'passwordConfirm' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'email.regex' => 'Email must be @hcmut.edu.vn',
            'password.min' => 'Password must have at least 8',
            'passwordConfirm' => 'PasswordConfirm not same with password'
        ];
    }
}
