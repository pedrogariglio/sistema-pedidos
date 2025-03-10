@extends('../layouts.plantilla')

@section('cabecera')
<h1 class="text-center text-3xl font-bold">Products List</h1>
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

<!-- Tabla Responsive -->
<div class="overflow-x-auto">
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 text-left hidden md:table-cell">
                    <select name="sort_by" id="sort_id"
                            onchange="window.location.href=this.value"
                            class="mt-1 block w-5px rounded-md border-gray-300 shadow-sm">
                        <option value="{{ request()->fullUrlWithQuery(['sort_by' => 'id', 'sort_order' => 'asc']) }}"
                            {{ request('sort_by') == 'id' && request('sort_order') == 'asc' ? 'selected' : '' }}>
                            ID ↑     
                        </option>
                        <option value="{{ request()->fullUrlWithQuery(['sort_by' => 'id', 'sort_order' => 'desc']) }}"
                            {{ request('sort_by') == 'id' && request('sort_order') == 'desc' ? 'selected' : ''}}>
                            ID ↓
                        </option>
                    </select></th>
                <th class="p-2 text-left hidden md:table-cell">Name</th>
                <th class="p-2 text-left hidden md:table-cell">Description</th>
                <th class="p-2 text-left hidden md:table-cell"> 
                    <select name="sort_by" id="sort_price"
                            onchange="window.location.href=this.value"
                            class="mt-1 block w-5px rounded-md border-gray-300 shadow-sm">
                        <option value="{{ request()->fullUrlWithQuery(['sort_by' => 'price', 'sort_order' => 'asc']) }}"
                            {{ request('sort_by') == 'price' && request('sort_order') == 'asc' ? 'selected' : '' }}>
                            PRICE ↑     
                        </option>
                        <option value="{{ request()->fullUrlWithQuery(['sort_by' => 'price', 'sort_order' => 'desc']) }}"
                            {{ request('sort_by') == 'price' && request('sort_order') == 'desc' ? 'selected' : ''}}>
                            PRICE ↓
                        </option>
                    </select></th>
                <th class="p-2 text-left hidden md:table-cell">
                    <select name="sort_by" id="sort_stock"
                            onchange="window.location.href=this.value"
                            class="mt-1 block w-5px rounded-md border-gray-300 shadow-sm">
                    <option value="{{ request()->fullUrlWithQuery(['sort_by' => 'stock', 'sort_order' => 'asc']) }}"
                        {{ request('sort_by') == 'stock' && request('sort_order') == 'asc' ? 'selected' : '' }}>
                        STOCK ↑
                    </option>
                    <option value="{{ request()->fullUrlWithQuery(['sort_by' => 'stock', 'sort_order' => 'desc']) }}"
                        {{ request('sort_by') == 'stock' && request('sort_order') == 'desc' ? 'selected' : '' }}>
                        STOCK ↓
                    </option>
                    </select></th>
                <th class="p-2 text-left hidden md:table-cell">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="border-b">
                <td class="p-2 block md:table-cell" data-label="ID">{{ $product->id }}</td>
                <td class="p-2 block md:table-cell" data-label="Name">{{ $product->name }}</td>
                <td class="p-2 block md:table-cell" data-label="Description">{{ $product->short_description }}</td>
                <td class="p-2 block md:table-cell" data-label="Price">{{ $product->price_formatted }}</td>
                <td class="p-2 block md:table-cell {{ $product->getStockStatusClass() }}" data-label="Stock">
                    {{ $product->getStockStatusText() }}
                </td>                           
                <td class="p-2 block md:table-cell" data-label="Actions">
                    <div class="dropdown">
                        <button onclick="toggleDropdown({{ $product->id }})" class="dropdown-btn">Actions</button>
                        <div id="myDropdown{{ $product->id }}" class="dropdown-content">
                            <a href="{{ route('products.edit', $product) }}">
                                <svg class="icon update-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                Update
                            </a>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $product->id }}').submit();">
                                <svg class="icon delete-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                                Delete
                            </a>
                        </div>
                    </div>
                    <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
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
        <button type="submit" class="w-full sm:w-auto bg-blue-500 text-white py-2 px-8 rounded hover:bg-blue-700">New product</button>
    </form>
    
    <div class="w-full sm:w-auto">
        {{ $products->links() }}
    </div>
</div>
@endsection

@section('pie')
    <p class="text-center">Thanks you for using our system!</p>
@endsection
