<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Order #{{ $order->id }}</title>
    @include('partials.pdf-styles')
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Order Detail</h1>
        </div>

        <div class="order-tittle">
            Order #{{ $order->id }}
        </div>

        <div class="info-grid">
            <div class="info-block">
                <div class="info-block-title">Customer Details</div>
                <div>{{ $order->user->name}}</div>
                <div>{{ $order->user->email}}</div>
            </div>
        </div>

        <div class="info-block">
            <div class="info-block-title">Order Status</div>
            <div>
                <span class="status status-{{ strtolower($order->status) }}">
                    {{ ucfirst($order->status) }}
                </span>
            </div>  
        </div>
    </div>

    <div class="info-block">
        <div class="item-block-tittle">Total Price</div>
        <div class="price">${{ number_format($order->total_price, 2)}}</div>
    </div>

    <div class="items-section">
        <div class="items-title">Order Items</div>
        <table class="items-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th class="quantity-price">Quantity x price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item )
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td class="quantity-price">{{ $item->quantity }} x ${{ number_format($item->price, 2) }}</td>
                </tr>            
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="footer">
        <p>Thank you for your order!</p>
        <p>Generated on {{ date('Y-m-d H:i:s') }}</p>
    </div>
</body>
</html>