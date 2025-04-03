@extends ("../layouts.crud")

@section('content')
<div class="max-w-md mx-auto mt-10">
    <form method="post" action="{{ route('products.update', $product->id) }}" class="mb-4">
        @csrf
        @method('PUT') <!-- Método PUT para actualizar recursos -->

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2"> New Product Name:</label>
            <input type="text" id="name" name="name" required 
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                @error('name') border-red-500 @enderror"
                value="{{ old('name', $product->name) }}">
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">New Description:</label>
            <textarea type="text" id="description" name="description" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
            @error('description') border-red-500 @enderror" rows="4"> 
                {{ old('description', $product->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">New Price:</label>
            <input type="number" id="price" name="price" step="0.01" min="0" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
            @error('price') border-red-500 @enderror"
                value="{{ old('price', $product->price) }}">
            @error('price')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="stock" class="block text-gray-700 text-sm font-bold mb-2">Stock:</label>
            <input type="number" id="stock" name="stock" min="0" required 
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
            @error('stock') border-red-500 @enderror"             
                value="{{ old('stock', $product->stock) }}">
            @error('stock')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-2">
            <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-700 transition duration-300 text-white font-bold py-2 px-4 rounded flex-1 focus:outline-none focus:shadow-outline">
                Actualizar registro
            </button>
            <input type="reset" 
                   class="bg-red-500 hover:bg-red-700 transition duration-300 text-white font-bold py-2 px-4 rounded flex-1 focus:outline-none focus:shadow-outline" 
                   onclick="return confirm('¿Estás seguro que desea vaciar el formulario?')" 
                   value="Vaciar formulario">
        </div>
        
    </form>
</div>
@endsection

@section('pie')
    <p>Thank you for using our system!</p>
@endsection