<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        if (auth()->user()->role === 'customer') {
            return view('dashboard.customer');
        }  
            $products = Product::where('seller_id', auth()->id())->get();
            return view('dashboard.seller', compact('products'));
        
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required',
            'image'=> 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'seller_id' => auth()->id(),
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

        return redirect('/dashboard');
    }

    public function edit(Product $product)
    {
        if ($product->seller_id !== auth()->id()) {
    return redirect('/dashboard');
        }

        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product){
        If ($product->seller_id !== auth()->id()) {
            return redirect('/dashboard');
        }

        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required',
            'image'=> 'nullable|image|max:2048',
        ]);

        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

        return redirect('/dashboard');
    }

    public function destroy(Product $product){
        if ($product->seller_id !== auth()->id()) {
            return redirect('/dashboard');
        }

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect('/dashboard');
    }
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function buy(Request $request, Product $product) {
        if (auth()->user()->role === 'seller') {
            return back()->withErrors(['role' => 'Sellers cannot buy products']);
        }
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->stock,
        ]);

        $customer = auth()->user();
        $total = $product->price * $request->quantity;

        if ($customer->balance < $total) {
            return back()->withErrors(['quantity' => 'Insufficient balance. You have $'.$customer->balance.' but need $'.$total]);
        }

        if ($product->stock < $request->quantity) {
            return back()->withErrors(['quantity' => 'Not enough stock']);
        }

        $customer->decrement('balance', $total);
        $product->seller->increment('balance', $total);

        $order = Order::create([
            'customer_id' => $customer->id,
            'total' => $total,
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