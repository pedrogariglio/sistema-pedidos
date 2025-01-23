@extends('../layouts.plantilla')

@section('cabecera')
<h1 class="text-center text-3xl font-bold">Orders List</h1>
@endsection

@section('content')
<div class="overflow-x-auto">
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 text-left hidden md:table-cell">ID</th>
                <th class="p-2 text-left hidden md:table-cell">Users</th>
                <th class="p-2 text-left hidden md:table-cell">Status</th>
                <th class="p-2 text-left hidden md:table-cell">Total</th>
                <th class="p-2 text-left hidden md:table-cell">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="border-b">
                <td class="p-2 block md:table-cell" data-label="ID">{{ $order->id }}</td>
                <td class="p-2 block md:table-cell" data-label="Name">{{ $order->user->name }}</td>
                <td class="p-2 block md:table-cell" data-label="Status">{{ $order->status }}</td>
                <td class="p-2 block md:table-cell" data-label="Price">{{ $order->total_price }}</td>
                <td class="p-2 block md:table-cell" data-label="Actions">
                    <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                        <form action="{{ route('orders.show', $order) }}" class="w-full sm:w-auto">
                            <button type="submit" class="w-full sm:w-auto bg-blue-500 text-white py-1 px-2 rounded hover:bg-blue-700">See</button>
                        </form>
                        <form action="{{ route('orders.destroy', $order) }}" method="POST" class="w-full sm:w-auto">
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
@endsection

@section('pie')
    <p>¡Gracias por utilizar nuestro sistema!</p>
@endsection
