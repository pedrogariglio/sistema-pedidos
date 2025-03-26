<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\{ProductController, OrderController};

Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);

Route::get('/', function () {
    return View::make('welcome');
})->name('home');

Route::get('/reports', function() {
    return View::make('reports.index');
})->name('reports.index');

Route::get('/orders/{order}/pdf', [OrderController::class, 'generatePdf'])->name('orders.pdf');


