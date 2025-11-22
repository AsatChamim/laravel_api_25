<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try{
            $product = Product::all();
            return response()->json([
                'message'=>'succes',
                'data'=>$product
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message'=>$e->getMessage(),
                'data'=>null,
            ], 401);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        //
        try{
            $validate = $request->validate([
                'name'=>'required|max:255',
                'description'=>'required',
                'product_category_id'=>'required|exists:category_products,id'
            ]);
            $product = Product::create($validate);
            return response()->json([
                'message'=>'tersimpan',
                'data'=>$product
            ], 201);
        }catch(\Exception $e){
            return response()->json([
                'message'=>$e->getMessage(),
                'data'=>null, 
            ], 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        //
        try{
            $product=Product::find($id);
            return response()->json($product);

        } catch(\Exception $e){
            return response()->json([
                'message'=>$e->getMessage(),
                'data'=>null,
            ],401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try{
            $product=Product::find($id);
            $validate = $request->validate([
                'name'=>'required|max:255',
                'description'=>'required',
                'product_category_id'=>'required|exists:category_products,id'
            ]);
            $product -> update($validate);
            return response()->json([
                'message'=>'tersimpan',
                'data'=>$product
            ],201); 

        } catch(\Exception $e){
            return response()->json([
                'message'=>$e->getMessage(),
                'data'=>null,
            ],401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try{
            $product=Product::findOrFail($id);
            $product->delete();
            return response()->json([
                'type'=>'succes dihapus',
                'data'=>$product
            ],201);

        } catch(\Exception $e){
            return response()->json([
                'message'=>$e->getMessage(),
                'data'=>null,
            ],401);
        }
    }
}