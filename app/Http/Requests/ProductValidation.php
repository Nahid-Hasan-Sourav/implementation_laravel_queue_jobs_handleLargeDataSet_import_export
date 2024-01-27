<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_name'       => 'required|unique:products,name',
            'category_id'        => 'required',
            'product_price'      => 'required',
            'product_quantity'   => 'required'


        ];
    }

    public function message()
    {
     return [
        'category_id'               => 'Please enter unique product name',
        'product_name.required'     => 'Please enter unique product name',
        'product_price.required'    => 'Please enter unique product price',
        'product_quantity.required' => 'Please enter unique product quantity'


     ];
    }
}
