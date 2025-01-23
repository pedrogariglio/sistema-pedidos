@extends('../layouts.plantilla')

@section('cabecera')
<h1 class="text-center text-3xl font-bold">Product List</h1>
@endsection

@if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-4">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 my-4">
        {{ session('error') }}
    </div>
@endif

@section('content')
<div>
 <!-- Formulario de búsqueda -->
 <form method="GET" action="{{ route('products.index') }}" enctype="multipart/form-data" class="mb-4">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search by name or ID" value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
</form>
</div>

<!-- Ordenamiento -->
<div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4 mb-4">
    <div class="w-full sm:w-1/2">
        <label for="sort_id" class="block text-sm font-medium text-gray-700">Sort by ID</label>
        <select name="sort_by" id="sort_id"
                onchange="window.location.href=this.value"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            <option value="{{ request()->fullUrlWithQuery(['sort_by' => 'id', 'sort_order' => 'asc']) }}"
                    {{ request('sort_by') == 'id' && request('sort_order') == 'asc' ? 'selected' : '' }}>
                ID ↑     
            </option>
            <option value="{{ request()->fullUrlWithQuery(['sort_by' => 'id', 'sort_order' => 'desc']) }}"
                    {{ request('sort_by') == 'id' && request('sort_order') == 'desc' ? 'selected' : ''}}>
                ID ↓
            </option>
        </select>
    </div>

    <div class="w-full sm:w-1/2">
        <label for="sort_price" class="block text-sm font-medium text-gray-700">Sort by Price</label>
        <select name="sort_by" id="sort_price"
                onchange="window.location.href=this.value"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            <option value="{{ request()->fullUrlWithQuery(['sort_by' => 'price', 'sort_order' => 'asc']) }}"
                    {{ request('sort_by') == 'price' && request('sort_order') == 'asc' ? 'selected' : '' }}>
                PRICE ↑     
            </option>
            <option value="{{ request()->fullUrlWithQuery(['sort_by' => 'price', 'sort_order' => 'desc']) }}"
                    {{ request('sort_by') == 'price' && request('sort_order') == 'desc' ? 'selected' : ''}}>
                PRICE ↓
            </option>
        </select>
    </div>
</div>

<!-- Tabla Responsive -->
<div class="overflow-x-auto">
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 text-left hidden md:table-cell">ID</th>
                <th class="p-2 text-left hidden md:table-cell">Name</th>
                <th class="p-2 text-left hidden md:table-cell">Description</th>
                <th class="p-2 text-left hidden md:table-cell">Price</th>
                <th class="p-2 text-left hidden md:table-cell">Stock</th>
                <th class="p-2 text-left hidden md:table-cell">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="border-b">
                <td class="p-2 block md:table-cell" data-label="ID">{{ $product->id }}</td>
                <td class="p-2 block md:table-cell" data-label="Name">{{ $product->name }}</td>
                <td class="p-2 block md:table-cell" data-label="Description">{{ $product->description }}</td>
                <td class="p-2 block md:table-cell" data-label="Price">{{ $product->price }}</td>
                <td class="p-2 block md:table-cell" data-label="Stock">{{ $product->stock }}</td>
                <td class="p-2 block md:table-cell" data-label="Actions">
                    <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                        <form action="{{ route('products.edit', $product) }}" class="w-full sm:w-auto">
                            <button type="submit" class="w-full sm:w-auto bg-green-500 text-white py-1 px-2 rounded hover:bg-green-700">Update</button>
                        </form>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="w-full sm:w-auto">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full sm:w-auto bg-red-500 text-white py-1 px-2 rounded hover:bg-red-700">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Nuevo Producto y Paginación -->
<div class="flex flex-col sm:flex-row justify-between items-center mt-4">
    <form action="{{ route('products.create') }}" class="w-full sm:w-auto mb-2 sm:mb-0">
        @csrf
        <button type="submit" class="w-full sm:w-auto bg-blue-500 text-white py-1 px-8 rounded hover:bg-blue-700">New product</button>
    </form>
    
    <div class="w-full sm:w-auto">
        {{ $products->links() }}
    </div>
</div>

<div class="mt-4 px-4">
    {{ $products->links() }}
</div>
@endsection

@section('pie')
    <p class="text-center">¡Gracias por utilizar nuestro sistema!</p>
@endsection
