<?php

namespace App\Http\Requests;

use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
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
            'email' => ['required', 'email', 'unique:App\Models\User,email'],
            'password' => ['required', 'min:6'],
            'confirm_password' => ['required_with:password', 'same:password'],
            'name' => ['required'],
            'address' => ['nullable'],
            'phone' => ['required','regex: /^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/' ,'unique:App\Models\User,phone'],
            'role' => ['required'],
            'ID_number' => ['required_if:role,==,2', 'unique:App\Models\User,ID_number'],
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'Email',
            'password' => 'Password',
            'confirm_password' => 'Confirm Password',
            'name' => 'Name',
            'address' => 'Address',
            'phone' => 'Phone',
            'ID_number' => 'ID number',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute is required',
            'unique' => ':attribute is existed',
            'required_if' => ':attribute is required when create Driver',
        ];
    }

}
