<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use http\Env\Request;
use Illuminate\Validation\Rule;

class CreateTripRequest extends FormRequest
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
            'driver_id' => ['required'],
            'car_id' => ['required'],
            'source_id' => ['required', 'min:1', 'max:63'],
            'destination_id' => ['required', 'min:1', 'max:63', 'different:source_id'],
            'date_start' => ['required'],
            'time_start' => ['required'],
            'date_end' => ['required'],
            'time_end' => ['required'],
            'fare' => ['required', 'numeric', 'min:100000', 'max:500000'],
            'description' => ['nullable'],
        ];
    }

    public function attributes()
    {

        return [
            'driver_id' => 'Driver',
            'car_id' => 'Car',
            'source_id' => 'Source City',
            'destination_id' => 'Destination City',
            'date_start' => 'Date Start',
            'time_start' => 'Time Start',
            'date_end' => 'Date End',
            'time_end' => 'Time End',
            'fare' => 'Ticket Price',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute is required',
            'unique' => ':attribute is existed',
            'min' => ':attribute is not accepted',
            'max' => ':attribute is not accepted',
            'different' => ':attribute must be different with Source City',
        ];
    }
}
