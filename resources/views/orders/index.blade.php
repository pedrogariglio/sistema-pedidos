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


<div class="w-full sm:w-auto">
    {{ $orders->links() }}
</div>
@endsection

@section('pie')
    <p>Thank you for using our system!</p>
@endsection
