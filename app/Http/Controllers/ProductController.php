<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;


class ProductController extends Controller
{
    public function index()
    {
        return Products::all(); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
          
                'product_name' => 'required|string|max:255',
                'product_description' => 'nullable|string',
                'product_price' => 'required|numeric',
                'product_stock' => 'required|integer',
                'product_status' => 'required|boolean'
    
        ]);

        return Products::create($validated); 
    }

    public function show($id)
    {
        return Products::findOrFail($id); 
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'nullable|string',
            'product_price' => 'required|numeric|min:0',
            'product_stock' => 'required|integer|min:0',
            'product_status' => 'required|boolean',
        ]);

        $product = Products::findOrFail($id);
        $product->update($validated); 

        return $product; 
    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete(); 

        return response()->json(null, 204); 
    }

}
