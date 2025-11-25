<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductVarian;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductVarianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try{
            $variant = ProductVarian::all();
            return response()->json([
                'message'=>'succes',
                'data'=>$variant
            ], 200);

        } catch(\Exception $e){
            return response()->json([
                'message'=>$e->getMessage(),
                'data'=>null
            ],401); 
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
            $validatedData = $request->validate([
                'product_id'=>'required|exists:products,id',
                'name' => 'required|max:255',
                'description' => 'nullable',
                'price' => 'required|numeric',
                'stock' => 'required|integer',
            ]);
            $variant = ProductVarian::create($validatedData);
            return response()->json([
                'message'=>'succes',
                'data'=>$variant,
            ], 201);

        } catch(ValidationException $e){
            return response()->json([
                'message'=>'Validation failed',
                'errors'=>$e->errors(),
                'data'=>null
            ], 422); 
        } catch(\Exception $e){
            return response()->json([
                'message'=>$e->getMessage(),
                'data'=>null
            ],401); 
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try{
            $variant=ProductVarian::with('product')->findOrFail($id);
            return response()->json([
                'message'=>'succes',
                'data'=>$variant
            ],201);

        } catch(\Exception $e){
            return response()->json([
                'message'=>$e->getMessage(),
                'data'=>null
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
            $variant=ProductVarian::findOrFail($id);
            $validatedData = $request->validate([
                'product_id'=>'required|exists:products,id',
                'name' => 'required|max:255',
                'description' => 'nullable',
                'price' => 'required|numeric',
                'stock' => 'required|integer',
            ]);
            $variant -> update($validatedData);
            return response()->json([
                'message'=>'succes',
                'data'=>$variant,
            ], 201);

        } catch(ValidationException $e){
            return response()->json([
                'message'=>'Validation failed',
                'errors'=>$e->errors(),
                'data'=>null
            ], 422); 
        } catch(\Exception $e){
            return response()->json([
                'message'=>$e->getMessage(),
                'data'=>null
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
            $variant=ProductVarian::findOrFail($id);
            $variant -> delete();
            return response()->json([
                'message'=>'succes',
                'data'=>$variant,
            ], 201);


        } catch(\Exception $e){
            return response()->json([
                'message'=>$e->getMessage(),
                'data'=>null
            ],401); 
        } 
    }

    
}