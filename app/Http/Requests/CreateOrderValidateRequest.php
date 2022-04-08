<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderValidateRequest extends FormRequest
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
            'firstname' => 'required|min:3|max:50',
            'lastname' => 'required|min:3|max:50',
                'email' => 'required',
                'phone' => 'required|digits:10',
                'address' => 'required',
                'city' => 'required',
                'country' => 'required'
        ];
    }
}
