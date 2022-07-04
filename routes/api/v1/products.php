<?php

use App\Http\Controllers\Api\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductsController::class, 'index']);
Route::get('/products/{product}', [ProductsController::class, 'show']);
Route::post('/products', [ProductsController::class, 'store']);
Route::put('/products/{product}', [ProductsController::class, 'update']);
Route::delete('/products/{product}', [ProductsController::class, 'destroy']);
