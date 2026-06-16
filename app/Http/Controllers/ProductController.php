<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function buy(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->stock,
        ]);

        if ($product->stock < $request->quantity) {
            return back()->withErrors(['quantity' => 'Not enough stock']);
        }

        // Create an order
        $order = Order::create([
            'customer_id' => auth()->id(),
            'total' => $product->price * $request->quantity,
        ]);

        $order->items()->create([
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'price' => $product->price,
        ]);

        // Decrease product stock
        $product->decrement('stock', $request->quantity);

        return view('products.confirmation', compact('order', 'product'));
    }
}