@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Pedidos</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Estado</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->total_price }}</td>
                <td>
                    <a href="{{ route('orders.show', $order) }}" class="btn btn-info btn-sm">Ver</a>
                    <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
