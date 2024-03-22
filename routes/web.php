<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/form');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/form', [App\Http\Controllers\HomeController::class, 'productform'])->name('form');
Route::post('/formstore', [App\Http\Controllers\ProductController::class, 'store'])->name('product/store');
Route::get('/displaydata', [App\Http\Controllers\ProductController::class, 'displaydata'])->name('displaydata');
Route::get('/products/export', [App\Http\Controllers\ProductController::class, 'export'])->name('products.export');
Route::post('/import-products', [App\Http\Controllers\ProductController::class, 'import'])->name('import.products');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('api')->group(function () {
        require __DIR__.'/api.php';
    });


    Route::get('/token', function () {
        return csrf_token(); 
    });