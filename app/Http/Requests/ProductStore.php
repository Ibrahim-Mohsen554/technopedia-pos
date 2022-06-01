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
       return [
        'product_name' => 'required',
        'barcode' => 'required|string|max:50|unique:Products',
        'sku_num' => 'required',
        'buy_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'sell_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'brand_name' => 'required',
        'category_name' => 'required',

        ];
    }

     public function messages()
    {
        return [
            'product_name.required' => 'Product Name is required!',
            'sku_num.required' => 'Sku num  is required!',
            'buy_price.required' => 'Price  is required!',
            'sell_price.required' => 'Sell Price  is required!',
            'brand_name.required' => 'Brand Name   is required!',
            'category_name.required' => 'Category Name   is required!',
            'barcode.required' => 'Barcode Name   is required!',
        ];
    }
}
