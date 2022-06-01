<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStore extends FormRequest
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


        $product_id = $this->route('product')->id;
       return [

        'barcode' => 'required|string|max:50|unique:Products,barcode,' . $product_id,


        ];
    }

     public function messages()
    {
        return [


            'barcode.required' => 'Barcode Name   is required!',
        ];
    }
}
