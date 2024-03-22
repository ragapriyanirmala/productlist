<?php

use App\Http\Controllers\ProductController;

Route::get('/token', function () {
    return csrf_token(); 
});

Route::post('/products', [App\Http\Controllers\ProductController::class, 'store']);
?>