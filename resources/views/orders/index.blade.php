@extends('../layouts.plantilla')

@section('cabecera')
<h1 class="text-center text-3xl font-bold">Orders List</h1>
@endsection

@section('content')
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
                            {{ request('sort_by') == 'id' && request('sort_order') == 'desc' ? 'selected' : '' }}>
                            ID ↓
                        </option>
                    </select></th>
                <th class="p-2 text-left hidden md:table-cell">Users</th>
                <th class="p-2 text-left hidden md:table-cell">Status</th>
                <th class="p-2 text-left hidden md:table-cell">
                    <select name="sort_by" id="sort_total_price"
                            onchange="window.location.href=this.value"
                            class="mt-1 block w-5px rounded-md border-gray-300 shadow-sm">
                        <option value="{{ request()->fullUrlWithQuery(['sort_by' => 'total_price', 'sort_order' => 'asc']) }}"
                            {{ request('sort_by') == 'total_price' && request('sort_order') == 'asc' ? 'selected' : '' }}>
                            TOTAL ↑
                        </option>
                        <option value="{{ request()->fullUrlWithQuery(['sort_by' => 'total_price', 'sort_order' => 'desc']) }}"
                            {{ request('sort_by') == 'total_price' && request('sort_order') == 'desc' ? 'selected' : '' }}>
                            TOTAL ↓
                        </option>
                    </select></th>
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
                    <div class="dropdown">
                        <button onclick="toggleDropdown({{ $order->id }})" class="dropdown-btn">Actions</button>
                        <div id="myDropdown{{ $order->id }}" class="dropdown-content">
                            <a href="{{ route('orders.show', $order) }}">
                                <svg class="icon search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                                See
                            </a>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $order->id }}').submit();">
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
                    <form id="delete-form-{{ $order->id }}" action="{{ route('orders.destroy', $order) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div class="w-full sm:w-auto">
    {{ $orders->links() }}
</div>
@endsection

@section('pie')
    <p>Thank you for using our system!</p>
@endsection
