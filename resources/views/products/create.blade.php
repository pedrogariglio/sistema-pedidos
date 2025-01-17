@extends('../layouts.plantilla') 

@section("contenido")
    <form method="POST" action="{{ route('products.store') }}" class="mb-4">
        @csrf <!--Token CSRF para proteger contra ataques-->

        <div class="form-group mb-3">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" 
                value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" class="form-control" 
                value="{{ old('description') }}">
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group mb-3">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" class="form-control" step="0.01" min="0" 
                value="{{ old('price', '0.00') }}">
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" class="form-control" min="0" 
                value="{{ old('stock') }}">
            @error('stock')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

    @section('pie')
        <p>¡Gracias por utilizar nuestro sistema!</p>
    @endsection