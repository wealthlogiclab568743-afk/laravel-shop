<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Sales History</title>
</head>
<body>
    <h2>My Sales History</h2>
    <a href="/">Home</a>
    &nbsp;|&nbsp;
    <a href="/dashboard">Dashboard</a>
    &nbsp;|&nbsp;
    <form action="/logout" method="POST" style="display:inline">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <hr>

    <p>Your balance: ${{ auth()->user()->balance }}</p>

    <hr>

    @if ($orders->isEmpty())
        <p>You have no sales history yet.</p>
    @else
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Buyer</th> 
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price each</th>
                    <th>Total Earned</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                @foreach ($order->items as $item)

                @if ($item->product->seller_id === auth()->id())
                
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ $item->price }}</td>
                    <td>${{ $order->total }}</td>
                    <td>{{ $order->buyer->name }}</td>
                    <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                </tr>
                @endif
                @endforeach
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>                                        