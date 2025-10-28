<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request -> validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
        ]);
        $product = Product::create($validateData);
        return response()->json($product, 201);
    }
}