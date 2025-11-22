<?php

use App\Http\Controllers\VendorController;
use App\Http\Controllers\Api\ProductCategorieController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductVarianController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    Route::resource('products', ProductController::class);
    Route::resource('vendors', VendorController::class);
    Route::resource('Product', ProductController::class);
    Route::resource('ProductVarian', ProductVarianController::class);
    Route::resource('product_categorie', ProductCategorieController::class);
    
    Route::get('/halo', function(){
        return 'halo laravel';
    });
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');