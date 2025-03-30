<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderSearchRequest;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OrderSearchRequest $request)
    {
        $validated = $request->validated();

        // Valores por defecto
        $validated['sort_by'] = $validated['sort_by'] ?? 'id';
        $validated['sort_order'] = $validated['sort_order'] ?? 'desc';
        $validated['per_page'] = $validated['per_page'] ?? 10;

        $query = Order::query()->with('user');

        if (!empty($validated['search'])) {
            $query->where(function($q) use ($validated) {
                $q->where('name', 'like', '%' . $validated['search'] . '%')
                ->orWhere('id', 'like', '%' . $validated['search'] . '%');
            });
        }

        if (in_array($validated['sort_by'], ['id', 'total_price'])) {
            $query->orderBy($validated['sort_by'], $validated['sort_order']);
        }

        $orders = $query->paginate($validated['per_page'])
                ->appends(request()->query()); 

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        
        $order->load('user', 'items.product');
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        
        return redirect()->route('orders.index')->with('success', 'Order delete successfully');
    }

    public function generatePdf($orderId)
    {
        // 1. Obtener la orden con sus relaciones
        $order = Order::with([
                'user', 
                'items', 
                'items.product'  // Si necesito datos del producto
            ])->findOrFail($orderId);
    
        // 2. Pasar la variable a la vista
        $pdf = PDF::loadView('orders.pdf', [
            'order' => $order  
        ]);
    
        return $pdf->download("order-{$orderId}.pdf");
    }

    public function dashboard()
    {
        $latestOrders = Order::latest()->take(10)->get();      
    }
}
