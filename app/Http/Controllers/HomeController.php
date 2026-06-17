<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::when($request->category, function ($query, $category){
            return $query->where('category_id', $category);
        })->get();
       return view('home', compact('products','categories'));
    }

    public function history() {

    $user = auth()->user();

    if($user->role ==='customer') {
        $orders = Order::where('customer_id', $user->id)->with('items.product')->latest()->get();
        return view('history.customer', compact('orders'));
    }
    return redirect('/');
    }
}