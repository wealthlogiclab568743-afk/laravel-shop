<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <h2>Add New Product</h2>
    <a href="/dashboard">Back to Dashboard</a>
    <hr>

    <form action="/products" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Product Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="category_id">Category:</label><br>
        <select id="category_id" name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br><br>

        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" step="0.01" required><br><br>

        <label for="stock">Stock:</label><br>
        <input type="number" id="stock" name="stock" required><br><br>

        <label for="image">Product Image:</label><br>
        <input type="file" id="image" name="image"><br><br>

        <button type="submit">Add Product</button>
    </form>
</body>
</html>