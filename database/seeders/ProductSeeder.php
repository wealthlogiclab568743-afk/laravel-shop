<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use PharIo\Manifest\ElementCollection;

class ProductSeeder extends Seeder
{

    public function run(): void {

        $seller1 = User::where('name', 'seller1')->first();
        $seller2 = User::where('name', 'seller2')->first();

        $electronics = Category::where('name', 'Electronics')->first();
        $clothes = Category::where('name', 'Clothes')->first();
        $shoes = Category::where('name', 'Shoes')->first();
        $accessories = Category::where('name', 'Accessories')->first();
        $books = Category::where('name', 'Books')->first();

        Product::insert([
            ['name' => 'T-Shirt',    'description' => 'A simple t-shirt',   'price' => 19.99, 'stock' => 10, 'seller_id' => $seller1->id, 'category_id' => $clothes->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jeans',      'description' => 'Blue denim jeans',   'price' => 49.99, 'stock' => 5,  'seller_id' => $seller1->id, 'category_id' => $clothes->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sneakers',   'description' => 'White sneakers',     'price' => 79.99, 'stock' => 8,  'seller_id' => $seller1->id, 'category_id' => $shoes->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hat',        'description' => 'Baseball cap',       'price' => 14.99, 'stock' => 20, 'seller_id' => $seller1->id, 'category_id' => $accessories->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jacket',     'description' => 'Winter jacket',      'price' => 99.99, 'stock' => 3,  'seller_id' => $seller1->id, 'category_id' => $clothes->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Socks',      'description' => 'Cotton socks pack',  'price' => 9.99,  'stock' => 30, 'seller_id' => $seller1->id, 'category_id' => $clothes->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bag',        'description' => 'Leather handbag',    'price' => 59.99, 'stock' => 7,  'seller_id' => $seller1->id, 'category_id' => $accessories->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Watch',      'description' => 'Casual wristwatch',  'price' => 129.99,'stock' => 4,  'seller_id' => $seller1->id, 'category_id' => $accessories->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sunglasses', 'description' => 'Polarized sunglasses','price' => 39.99, 'stock' => 15, 'seller_id' => $seller1->id, 'category_id' => $accessories->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laptop',     'description' => 'Gaming laptop',      'price' => 999.99,'stock' => 2,  'seller_id' => $seller2->id, 'category_id' => $electronics->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Smartphone', 'description' => 'Latest smartphone',  'price' => 699.99,'stock' => 6,  'seller_id' => $seller2->id, 'category_id' => $electronics->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Headphones', 'description' => 'Noise-cancelling headphones','price' => 199.99,'stock' => 10,  'seller_id' => $seller2->id, 'category_id' => $electronics->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tablet',     'description' => '10-inch tablet',     'price' => 299.99,'stock' => 5,  'seller_id' => $seller2->id, 'category_id' => $electronics->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Camera',     'description' => 'Digital camera',     'price' => 499.99,'stock' => 3,  'seller_id' => $seller2->id, 'category_id' => $electronics->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'E-Reader',   'description' => 'E-book reader',      'price' => 129.99,'stock' => 8,  'seller_id' => $seller2->id, 'category_id' => $electronics->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bluetooth Speaker','description'=>'Portable speaker','price'=>49.99,'stock'=>12,'seller_id'=>$seller2->id,'category_id'=>$electronics->id,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Fitness Tracker','description'=>'Activity tracker','price'=>79.99,'stock'=>9,'seller_id'=>$seller2->id,'category_id'=>$electronics->id,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'VR Headset','description'=>'Virtual reality headset','price'=>299.99,'stock'=>4,'seller_id'=>$seller2->id,'category_id'=>$electronics->id,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Smart Home Hub','description'=>'Home automation hub','price'=>149.99,'stock'=>7,'seller_id'=>$seller2->id,'category_id'=>$electronics->id,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Wireless Charger','description'=>'Qi wireless charger','price'=>29.99,'stock'=>15,'seller_id'=>$seller2->id,'category_id'=>$electronics->id,'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}
    