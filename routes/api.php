<?php

use App\Http\Controllers\VendorController;
use App\Http\Controllers\Api\ProductCategorieController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductVarianController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public routes
Route::post('/v1/login', [AuthController::class, 'login']);
Route::post('/v1/register', [AuthController::class, 'register']);

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

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/v1/logout', [AuthController::class, 'logout']);
    Route::get('/v1/user', function (Request $request) {
        return $request->user();
    });
});