<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'product_name' => 'required|string|max:255',
            'product_description' => 'nullable|string',
            'product_price' => 'required|numeric|min:0', // CORRECCIÓN: product_price
            'product_stock' => 'required|integer|min:0',  // CORRECCIÓN: product_stock
            'product_status' => 'required|boolean',
        ];
    }
}
