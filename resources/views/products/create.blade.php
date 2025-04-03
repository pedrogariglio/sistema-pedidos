@extends('layouts.crud')

@section('content')
<div class="flex-1 flex flex-col md:ml-64 bg-gray-50">
    <!-- Cabecera con gradiente personalizado -->
    <header class="bg-indigo-600 py-5 shadow-md">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-white">Create new product</h1>
            <a href="{{ route('products.index') }}" class="text-gray-500 hover:text-indigo-100 flex items-center transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                Back to the catalog
            </a>
        </div>
    </header>
    
    <!-- Contenido principal -->
    <main class="container mx-auto my-8 px-4 flex-grow">
        <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
            <div class="p-8">
                <!-- Título del formulario con línea decorativa debajo -->
                <h2 class="text-xl font-medium text-gray-800 mb-6 pb-2 relative">
                    Product information
                    <span class="absolute bottom-0 left-0 w-20 h-1 bg-indigo-500 rounded-full"></span>
                </h2>
                
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Product name</label>
                            <input type="text" name="name" id="name" required 
                                class="appearance-none border border-gray-200 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200
                                @error('name') border-red-500 @enderror" 
                                value="{{ old('name') }}" placeholder="Ingrese nombre del producto">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="price" class="block text-gray-700 text-sm font-medium mb-2">Precio (€)</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="text-indigo-500 font-medium">€</span>
                                </div>
                                <input type="number" name="price" id="price" step="0.01" min="0" required 
                                    class="pl-10 appearance-none border border-gray-200 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200
                                    @error('price') border-red-500 @enderror" 
                                    value="{{ old('price') }}" placeholder="0.00">
                            </div>
                            @error('price')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label for="description" class="block text-gray-700 text-sm font-medium mb-2">Description</label>
                        <textarea name="description" id="description" 
                            class="appearance-none border border-gray-200 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200
                            @error('description') border-red-500 @enderror" 
                            rows="4" placeholder="Ingrese descripción del producto">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <label for="stock" class="block text-gray-700 text-sm font-medium mb-2">Stock</label>
                            <input type="number" name="stock" id="stock" min="0" required 
                                class="appearance-none border border-gray-200 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200
                                @error('stock') border-red-500 @enderror" 
                                value="{{ old('stock') }}" placeholder="0">
                            @error('stock')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="category" class="block text-gray-700 text-sm font-medium mb-2">Categoría</label>
                            <select name="category" id="category" 
                                class="appearance-none border border-gray-200 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200
                                @error('category') border-red-500 @enderror">
                                <option value="">Seleccionar categoría</option>
                                <option value="electronics" {{ old('category') == 'electronics' ? 'selected' : '' }}>Electrónica</option>
                                <option value="accessories" {{ old('category') == 'accessories' ? 'selected' : '' }}>Accesorios</option>
                                <option value="peripherals" {{ old('category') == 'peripherals' ? 'selected' : '' }}>Periféricos</option>
                            </select>
                            @error('category')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-end space-x-4">
                        <a href="{{ route('products.index') }}" class="font-medium text-gray-500 hover:text-gray-700 transition duration-200">
                            Cancel
                        </a>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-gray-500 font-medium py-3 px-8 rounded-lg shadow-sm hover:shadow focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-200">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
   
</div>
@endsection