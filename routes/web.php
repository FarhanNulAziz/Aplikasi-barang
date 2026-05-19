<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::get('/hello', function () {
    return 'Hello, World!';
});

Route::post('/products/{id}/delete', [ProductController::class, 'destroy'])
    ->name('products.delete');

// Route::resource otomatis akan membuat 7 rute CRUD standar (index,create,
// store, show, edit, update, destroy) ke dalam aplikasi.
Route::resource('categories', CategoryController::class);