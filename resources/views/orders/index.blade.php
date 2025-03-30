@extends('layouts.crud')

@section('title', 'Gestión de Pedidos')
@section('header-title', 'Listado de Pedidos')

@section('content')
<div class="mb-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-xl font-semibold">Pedidos Registrados</h2>
            <p class="text-sm text-gray-500">Total: {{ $orders->total() }} registros</p>
        </div>
        <a href="{{ route('orders.create') }}" 
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Nuevo Pedido
        </a>
    </div>
</div>

<div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-3 text-left">ID
                    <select onchange="window.location.href=this.value" 
                            class="ml-2 border rounded">
                        <option value="{{ request()->fullUrlWithQuery(['sort_by' => 'id', 'sort_order' => 'asc']) }}"
                            {{ request('sort_by') == 'id' && request('sort_order') == 'asc' ? 'selected' : '' }}>
                            ↑
                        </option>
                        <option value="{{ request()->fullUrlWithQuery(['sort_by' => 'id', 'sort_order' => 'desc']) }}"
                            {{ request('sort_by') == 'id' && request('sort_order') == 'desc' ? 'selected' : '' }}>
                            ↓
                        </option>
                    </select>
                </th>
                <th class="p-3 text-left">Cliente</th>
                <th class="p-3 text-left">Estado</th>
                <th class="p-3 text-left">Total
                    <select onchange="window.location.href=this.value" 
                            class="ml-2 border rounded">
                        <option value="{{ request()->fullUrlWithQuery(['sort_by' => 'total_price', 'sort_order' => 'asc']) }}"
                            {{ request('sort_by') == 'total_price' && request('sort_order') == 'asc' ? 'selected' : '' }}>
                            ↑
                        </option>
                        <option value="{{ request()->fullUrlWithQuery(['sort_by' => 'total_price', 'sort_order' => 'desc']) }}"
                            {{ request('sort_by') == 'total_price' && request('sort_order') == 'desc' ? 'selected' : '' }}>
                            ↓
                        </option>
                    </select>
                </th>
                <th class="p-3 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3">{{ $order->id }}</td>
                <td class="p-3">{{ $order->user->name }}</td>
                <td class="p-3">
                    <span class="px-2 py-1 text-xs rounded-full 
                        {{ $order->status == 'completado' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ $order->status }}
                    </span>
                </td>
                <td class="p-3">${{ number_format($order->total_price, 2) }}</td>
                <td class="p-3">
                    <div class="dropdown">
                        <button onclick="toggleDropdown({{ $order->id }})" 
                                class="dropdown-btn bg-gray-100 hover:bg-gray-200 text-gray-800 px-3 py-1 rounded flex items-center text-sm">
                            Actions
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="myDropdown{{ $order->id }}" class="dropdown-content">
                            <a href="{{ route('orders.show', $order) }}" class="flex items-center">
                                <svg class="icon search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                                Ver
                            </a>
                            <a href="{{ route('orders.edit', $order) }}" class="flex items-center">
                                <svg class="icon edit-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                Editar
                            </a>
                            <form action="{{ route('orders.destroy', $order) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full text-left flex items-center text-red-600">
                                    <svg class="icon delete-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $orders->appends(request()->query())->links() }}
</div>
@endsection