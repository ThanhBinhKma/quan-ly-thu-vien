<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'mssv' => 'required|regex:/(^[ACD]T[0-9]{6}$)/',
            'password' => 'required|confirmed|min:6|regex:((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[#?!@$%^&*-]).{6,20})',
            'password_confirmation' => 'required',
            'phone' => 'required|regex:'
        ];
    }

    public function messages()
    {
        return [
            'password.regax' => 'The password you have entered is not in the correct format'
        ];
    }
}
