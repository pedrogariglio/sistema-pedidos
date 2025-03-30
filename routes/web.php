<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\{DashboardController, ProductController, OrderController};

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



Route::get('/reports', function() {
    return View::make('reports.index');
})->name('reports.index');

Route::get('/orders/{order}/pdf', [OrderController::class, 'generatePdf'])->name('orders.pdf');


