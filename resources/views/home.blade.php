<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
</head>
<body>
    <p>
    <strong>My Shop</strong>
    &nbsp;&nbsp;
    @auth
        Welcome, {{ auth()->user()->name }}
        &nbsp;|&nbsp;
        <form method="POST" action="/logout" style="display:inline">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <a href="/signin">Sign In</a>
        &nbsp;|&nbsp;
        <a href="/signup">Sign Up</a>
    @endauth
</p>


<hr>

{{-- Products Grid --}}
<table width="100%">
    @foreach($products->chunk(4) as $row)
        <tr>
            @foreach($row as $product)
                <td valign="top" width="25%">
                    <p><strong>{{ $product->name }}</strong></p>
                    <p>{{ $product->description }}</p>
                    <p>Price: ${{ $product->price }}</p>
                    <p>Stock: {{ $product->stock }}</p>
                    <form method="POST" action="/cart/add/{{ $product->id }}">
                        @csrf
                        <button type="submit">Add to Cart</button>
                    </form>
                </td>
            @endforeach
        </tr>
    @endforeach
</table>

</body>
</html>
</body>
</html>