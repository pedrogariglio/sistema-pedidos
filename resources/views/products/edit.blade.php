@extends ("../layouts.plantilla")

@section('content')

<form method="post" action="{{ route('products.update', $product->id) }}" class="mb-4">
    @csrf
    @method('PUT') <!-- Método PUT para actualizar recursos -->

    <div class="form-group mb-3">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control" 
           value="{{ old('name', $product->name) }}">
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="description">Description:</label>
            <input type="text" id="description" name="description" class="form-control" 
            value="{{ old('description', $product->description) }}">
        @error('description')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" class="form-control" step="0.01" min="0" 
           value="{{ old('price', $product->price) }}">
        @error('price')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" class="form-control" 
           value="{{ old('stock', $product->stock) }}">
        @error('stock')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex flex-column flex-md-row gap-2 mb-3">
        <button type="submit" class="btn btn-success flex-grow-1">Actualizar registro</button>
        <input type="reset" class="btn btn-secondary flex-grow-1" 
           onclick="return confirm('¿Estás seguro que desea vaciar el formulario?')" value="Vaciar formulario">
    </div>
    </form>

@endsection

@section('pie')
    <p>¡Gracias por utilizar nuestro sistema!</p>
@endsection