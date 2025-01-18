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
<div class="overflow-x-auto bg-white shadow-md rounded-lg">
    <table class="min-w-full border-collapse block md:table">
        <thead class="block md:table-header-group">
            <tr class="border border-gray-300 md:border-none block md:table-row">
                <th class="bg-gray-200 text-left px-4 py-2 block md:table-cell">ID</th>
                <th class="bg-gray-200 text-left px-4 py-2 block md:table-cell">Name</th>
                <th class="bg-gray-200 text-left px-4 py-2 block md:table-cell">Description</th>
                <th class="bg-gray-200 text-left px-4 py-2 block md:table-cell">Price</th>
                <th class="bg-gray-200 text-left px-4 py-2 block md:table-cell">Stock</th>
                <th class="bg-gray-200 text-left px-4 py-2 block md:table-cell">Actions</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group">
            @foreach($products as $product)
            <tr class="border border-gray-300 md:border-none block md:table-row">
                <td class="px-4 py-2 block md:table-cell">{{ $product->id }}</td>
                <td class="px-4 py-2 block md:table-cell">{{ $product->name }}</td>
                <td class="px-4 py-2 block md:table-cell">{{ $product->description }}</td>
                <td class="px-4 py-2 block md:table-cell">{{ $product->price }}</td>
                <td class="px-4 py-2 block md:table-cell">{{ $product->stock }}</td>
                <td class="px-4 py-2 block md:table-cell">
                    <form action="{{ route('products.create') }}" class="inline-block">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white py-1 px-2 rounded hover:bg-blue-700">Insert</button>
                    </form>
                    <form action="{{ route('products.edit', $product) }}" class="inline-block">
                        <button type="submit" class="bg-green-500 text-white py-1 px-2 rounded hover:bg-green-700">Update</button>
                    </form>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded hover:bg-red-700">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('pie')
    <p class="text-center">¡Gracias por utilizar nuestro sistema!</p>
@endsection
