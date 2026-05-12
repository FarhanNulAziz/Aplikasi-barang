<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index']);

Route::get('/insert', [ProductController::class, 'insert']);
Route::get('/update', [ProductController::class, 'update']);
Route::get('/delete', [ProductController::class, 'delete']);

Route::get('create-product', [ProductController::class, 'create']);
Route::post('create-product', [ProductController::class, 'store']);

Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');