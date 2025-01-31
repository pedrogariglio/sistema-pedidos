@extends('../layouts.plantilla')

@section('cabecera')
<h1 class="text-center text-3xl font-bold">Create New Product</h1>
@endsection

@section('content')
<div class="max-w-md mx-auto mt-10">
    <form action="{{ route('products.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Product Name</label>
            <input type="text" name="name" id="name" required 
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                   @error('name') border-red-500 @enderror" 
                   value="{{ old('name') }}" placeholder="Enter product name">
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea name="description" id="description" 
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                      @error('description') border-red-500 @enderror" 
                      rows="4" placeholder="Enter product description">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
            <input type="number" name="price" id="price" step="0.01" min="0" required 
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                   @error('price') border-red-500 @enderror" 
                   value="{{ old('price') }}" placeholder="Enter product price">
            @error('price')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="stock" class="block text-gray-700 text-sm font-bold mb-2">Stock</label>
            <input type="number" name="stock" id="stock" min="0" required 
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                   @error('stock') border-red-500 @enderror" 
                   value="{{ old('stock') }}" placeholder="Enter product stock">
            @error('stock')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Create Product
            </button>
            <a href="{{ route('products.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection

@section('pie')
    <p class="text-center">Thank you for using our system!</p>
@endsection