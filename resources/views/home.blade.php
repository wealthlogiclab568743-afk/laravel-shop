<!DOCTYPE html>
<html>
<head>
    <title>Shop</title>
</head>
<body>

{{-- Header --}}
<p>
    <strong>My Shop</strong>
    &nbsp;&nbsp;
    @auth
        Welcome, {{ auth()->user()->name }}
        &nbsp;|&nbsp;
        <a href="/dashboard">Dashboard</a>
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

<table width="100%">
    <tr>

        {{-- Left Sidebar: Categories --}}
        <td width="15%" valign="top">
            <p><strong>Categories</strong></p>
            <p><a href="/">All</a></p>
            @foreach($categories as $category)
                <p><a href="/?category={{ $category->id }}">{{ $category->name }}</a></p>
            @endforeach
        </td>

        {{-- Divider --}}
        <td width="1%">|</td>

        {{-- Products Grid --}}
        <td valign="top">
            <table width="100%">
                @foreach($products->chunk(4) as $row)
                    <tr>
                        @foreach($row as $product)
                            <td valign="top" width="25%">
                                {{-- Image --}}
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" width="120"><br>
                                @else
                                    <p>No image</p>
                                @endif

                                <p><strong>{{ $product->name }}</strong></p>
                                <p>{{ $product->description }}</p>
                                <p>Price: ${{ $product->price }}</p>
                                <p>Stock: {{ $product->stock }}</p>
                                <p>Category: {{ $product->category->name }}</p>
                                @if (!auth()->check() || auth()->user()->role === 'customer')
                                <a href="/products/{{ $product->id }}">
                                    <button>Buy</button>
                                </a>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </td>

    </tr>
</table>

</body>
</html>