<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>
<body>
    <h2>Order Confirmation</h2>
    <p>Thank you for your purchase!</p>
    <hr>
    <p>Product: {{ $product->name}}</p>
    <p>Quantity: {{ $order->items->first()->quantity }}</p>
    <p>Total: ${{ $order->total}}</p>
    <hr>
    <a href="/">Back to Home</a>
</body>
</html>