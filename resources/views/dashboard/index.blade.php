@extends('../layouts.plantilla')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Sección de Últimos Pedidos -->
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Últimos pedidos</h2>
            <button class="text-gray-400 hover:text-gray-600">×</button>
        </div>
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-4 py-2 text-left">N°</th>
                    <th class="px-4 py-2 text-left">Proveedor</th>
                    <th class="px-4 py-2 text-left">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($latestOrders as $order)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $order->numero }}</td>
                    <td class="px-4 py-3">{{ $order->proveedor }}</td>
                    <td class="px-4 py-3">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Sección de Nuevos Productos -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Nuevos productos</h2>
        <ul class="space-y-3">
            @foreach($newProducts as $product)
            <li class="py-1 border-b last:border-0">{{ $product->name }}</li>
            @endforeach
        </ul>
        <div class="mt-4 pt-2 border-t">
            <a href="{{ route('products.index') }}" class="text-indigo-600 hover:text-indigo-800">
                Ver todos los productos →
            </a>
        </div>
    </div>
</div>
@endsection