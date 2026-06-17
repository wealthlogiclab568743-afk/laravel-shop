<!DOCTYPE html>
<html>
<head>
    <title>{{ $product->name }}</title>
</head>
<body>

<p><a href="/">Home</a></p>
<hr>

{{-- Image --}}
@if($product->image)
    <img src="{{ asset('storage/' . $product->image) }}" width="200"><br><br>
@endif

<h2>{{ $product->name }}</h2>
<p>Category: {{ $product->category->name }}</p>
<p>Description: {{ $product->description }}</p>
<p>Price: ${{ $product->price }}</p>
<p>Stock: {{ $product->stock }}</p>
<p>Seller: {{ $product->seller->name }}</p>

<hr>

@if($product->stock > 0)
    @auth
        @if(auth()->user()->role === 'seller')
            <p>Sellers cannot buy products.</p>
        @else
            <p>Your Balance: ${{ auth()->user()->balance }}</p> 
        @if ($errors->any())
            <p>{{ $errors->first() }}</p>
        @endif
        <form method="POST" action="/products/{{ $product->id }}/buy" id="buyform">
            @csrf
            Quantity: <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}">
            <br><br>
            <button type="button" onclick="confirmBuy()">Buy Now</button>
        </form>

        <script>
            document.getElementById('quantity').addEventListener('input', function() {
                let price = {{ $product->price }};
                let quantity = this.value;
                document.getElementById('total').innerText = 'Total: $' + (quantity * price).toFixed(2);
            });

            function confirmBuy() {
                let quantity = document.getElementById('quantity').value;
                let total = document.getElementById('total').innerText
                if (window.confirm('Buy ' + quantity + ' item(s) for a total of $' + total.toFixed(2) + '?')){
                    document.getElementById('buyForm').submit();
                }
        }
        </script>
        @endif
    @else
        <p>You must <a href="/signin">Sign In</a> to buy this product.</p>
    @endauth
@else
    <p>Out of stock.</p>
@endif

</body>
</html>