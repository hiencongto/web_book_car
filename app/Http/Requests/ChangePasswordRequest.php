<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => ['required', 'min:6'],
            'confirm_password' => ['required_with:password', 'same:password'],
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'Password',
            'confirm_password' => 'Confirm Password',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute is required',
            'unique' => ':attribute is existed',
//            'required_if' => ':attribute is required when create Driver',
        ];
    }
}
