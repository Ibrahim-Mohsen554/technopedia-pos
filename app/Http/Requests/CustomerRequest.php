<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
           'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_email' => 'required |email',
            'customer_address' => 'required',
            'c_type' => 'required'
        ];
    }

     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'customer_name.required' => 'Customer Name is required!',
            'customer_phone.required' => 'Customer Phone is required!',
            'c_type.required' => 'Customer Type is required!'
        ];
    }
}
