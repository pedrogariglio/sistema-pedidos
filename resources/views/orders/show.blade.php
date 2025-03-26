@extends('../layouts.plantilla')

@section('cabecera')
<div class="py-6">
    <h1 class="text-center text-3xl font-bold">Orders Detail</h1>
</div>
@endsection

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-8">
    <div class="space-y-6">
        {{-- Order ID Section --}}
        <div>
            <h2 class="text-xl font-bold">Order #{{ $order->id }}</h2>
        </div>

        {{-- Customer Information --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="font-semibold">Customer Details</p>
                <p class="text-gray-600">{{ $order->user->name }}</p>
                <p class="text-gray-600">{{ $order->user->email }}</p>
            </div>
            <div>
                <p class="font-semibold">Order Status</p>
                <span class="{{ $order->getStatusColorClass() }} font-medium">
                    {{ ucfirst($order->status) }}
                </span>
            </div>
        </div>

        {{-- Price Information --}}
        <div>
            <p class="font-semibold">Total Price</p>
            <p class="text-lg">${{ number_format($order->total_price, 2) }}</p>
        </div>

        {{-- Order Items --}}
        <div>
            <h3 class="text-lg font-bold mb-3">Order Items</h3>
            <div class="bg-gray-50 rounded-lg p-4">
                <ul class="space-y-2">
                    @foreach ($order->items as $item)
                    <li class="flex justify-between items-center">
                        <span>{{ $item->product->name }}</span>
                        <span class="text-gray-600">
                            {{ $item->quantity }} x ${{ number_format($item->price, 2) }}
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- Back Button --}}
        <div class="pt-4">
            <a href="{{ route('orders.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-700 text-white rounded-lg transition duration-150 ease-in-out">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Orders
            </a>

            <a href="{{ route('orders.pdf', $order->id) }}" 
                class="inline-flex items-center justify-center w-20 h-10 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition duration-150 ease-in-out">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                     <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path>
                     <polyline points="14 2 14 8 20 8"></polyline>
                     <path d="M10 13h2v3"></path>
                     <path d="M10 20v-3m-3 0h6"></path>
                 </svg>
                 PDF
             </a>
        </div>
    </div>
</div>

@endsection

@section('pie')
<div class="text-center py-4 text-gray-600">
    <p>Thank you for using our system!</p>
</div>
@endsection