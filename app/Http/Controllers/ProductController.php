<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoSearchRequest;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductoSearchRequest $request)
    {
        $validated = $request->validated();
        
        $query = Product::query();

        if ($validated['search']) {
            $query->where(function ($q) use ($validated) {
                $q->where('name', 'like', '%' . $validated['search'] . '%')
                ->orWhere('id', 'like', '%' . $validated['search'] . '%');
            });
        }

        if (in_array($validated['sort_by'], ['name', 'price', 'created_at'])) {
            $query->orderBy($validated['sort_by'], $validated['sort_order']);
        }

        $products = $query->paginate($validated['per_page'])
                 ->appends(request()->query()); 
                           



        return view('products.index', compact('products'))->with($validated);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product delete successfully');
    }
}
