@extends('../layouts.plantilla')

@section('content')
@csrf
<div class="container">
    <h1 class="my-4">Lista de Productos</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <form action="{{ route('products.create') }}" style="display: inline-block">
                        @csrf
                        <button type="submit" class="btn btn-primary">Insert record</button>
                    </form>
                    <form action="{{ route('products.edit', $product) }}" style="display:inline;">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('pie')
    <p>¡Gracias por utilizar nuestro sistema!</p>
@endsection
