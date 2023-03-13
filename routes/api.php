<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ShippingMethodController;
use App\Http\Controllers\SkuController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return new UserResource($request->user());
});

// Unprotected
Route::post('login', [AuthController::class, 'store']);
Route::post('sku/search', [SkuController::class, 'search']);
Route::apiResource('category', CategoryController::class)->only(['index', 'show']);
Route::apiResource('customer', CustomerController::class)->only(['store']);
Route::apiResource('opportunity', OpportunityController::class)->only(['store']);
Route::apiResource('order', OrderController::class)->only(['show', 'store']);
Route::apiResource('package', PackageController::class)->only(['index', 'show']);
Route::apiResource('product', ProductController::class)->only(['index', 'show']);
Route::apiResource('register', RegistrationController::class)->only(['store']);
Route::apiResource('sku', SkuController::class)->only(['index', 'show']);
Route::apiResource('shipping-method', ShippingMethodController::class)->only(['index', 'show']);

// Protected
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::delete('logout', [AuthController::class, 'destroy']);
    Route::apiResource('product', SkuController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('sku', SkuController::class)->only(['store', 'update', 'destroy']);
});
