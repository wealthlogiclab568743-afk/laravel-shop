<!DOCTYPE html>
<html>
<head><title>Edit Product</title></head>
<body>

<h2>Edit Product</h2>
<a href="/dashboard">Back to Dashboard</a>
<hr>

@if($errors->any())
    <p>{{ $errors->first() }}</p>
@endif

<form method="POST" action="/products/{{ $product->id }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    Name: <input type="text" name="name" value="{{ $product->name }}"><br><br>
    Description: <textarea name="description">{{ $product->description }}</textarea><br><br>
    Price: <input type="number" name="price" step="0.01" value="{{ $product->price }}"><br><br>
    Stock: <input type="number" name="stock" value="{{ $product->stock }}"><br><br>

    Category:
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select><br><br>

    Current Image:<br>
    @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" width="80"><br><br>
    @else
        No image<br><br>
    @endif

    New Image: <input type="file" name="image"><br><br>
    <button type="submit">Update Product</button>
</form>

</body>
</html>