<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTripDetailRequest extends FormRequest
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
            'customer_id' => ['required'],
//            'trip_id' => ['required'],
            'pick_up' => ['required'],
            'drop_off' => ['required'],
            'num_person' => ['required'],
//            'vote' => ['sometimes', 'numeric', 'integer'],
//            'cmt' => ['nullable'],
            'user_note' => ['nullable'],
        ];
    }

    public function attributes()
    {
        return [
            'customer_id' => 'Customer',
            'trip_id' => 'Trip',
            'pick_up' => 'Pick Up Address',
            'drop_off' => 'Drop Off Address',
            'num_person' => 'Person Number',
            'vote' => 'Vote'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute is required',
        ];
    }
}
