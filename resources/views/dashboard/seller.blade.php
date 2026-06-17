<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
</head>
<body>
    <h1>Seller {{ auth()->user()->name }} Dashboard</h1>
    <a href="/">Home</a>
    &nbsp;|&nbsp;
    <form action="/logout" method="POST" style="display:inline">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <hr>

    <a href="/products/create">+Add New Product</a>

    <hr>

    @if($products->isEmpty())
        <p>You have no products yet.</p>
    @else
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                            @if ($product->image)<img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="60">
                            @else
                                <p>No image available</p>
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <a href="/products/{{ $product->id }}/edit">Edit</a>
                            &nbsp;|&nbsp;
                            <form action="/products/{{ $product->id }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>