<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $latestOrders = Order::latest()->take(5)->get();
        $newProducts = Product::latest()->take(5)->get();

        return view('dashboard.index', [
            'latestOrders' => $latestOrders,
            'newProducts' => $newProducts
        ]); 
        
    }
}
