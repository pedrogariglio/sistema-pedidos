<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProductController, OrderController};


Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
