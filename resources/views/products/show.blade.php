<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$product->name}}</title>
</head>
<body>
    <p><a href="/">Home</a></p>
    <hr>

    <h2>{{$product->name}}</h2>
    <p>Category: {{$product->category->name}}</p>
    <p>{{$product->description}}</p>
    <p>Price: ${{$product->price}}</p>
    <p>Stock: {{$product->stock}}</p>
    <p>Seller: {{$product->seller->name}}</p>

    <hr>

    @if ($product->stock > 0)
        @auth
            <form action="/products/{{$product->id}}/buy" method="POST">
                @csrf
                @if ($errors->any())
                <p>{{ $errors->first() }}</p>
                @endif
                Quantity: <input type="number" name="quantity" value="1" min="1" max="{{$product->stock}}">
                <br><br>
                <button type="submit">Buy Now</button>
            </form>
        @else
            <p>You must <a href="/signin">Sign in</a> to buy this product.</p>
        @endauth
    @else
        <p>Out of Stock</p>
    @endif
</body>
</html>