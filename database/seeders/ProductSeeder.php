<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;

class ProductSeeder extends Seeder
{

    public function run(): void {

        $seller1 = User::where('name', 'seller1')->first();
        $seller2 = User::where('name', 'seller2')->first();

        Product::insert([
            ['name' => 'T-Shirt',    'description' => 'A simple t-shirt',   'price' => 19.99, 'stock' => 10, 'seller_id' => $seller1->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jeans',      'description' => 'Blue denim jeans',   'price' => 49.99, 'stock' => 5,  'seller_id' => $seller1->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sneakers',   'description' => 'White sneakers',     'price' => 79.99, 'stock' => 8,  'seller_id' => $seller1->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hat',        'description' => 'Baseball cap',       'price' => 14.99, 'stock' => 20, 'seller_id' => $seller1->id    , 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jacket',     'description' => 'Winter jacket',      'price' => 99.99, 'stock' => 3,  'seller_id' => $seller1->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Socks',      'description' => 'Cotton socks pack',  'price' => 9.99,  'stock' => 30, 'seller_id' => $seller1->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bag',        'description' => 'Leather handbag',    'price' => 59.99, 'stock' => 7,  'seller_id' => $seller1->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Watch',      'description' => 'Casual wristwatch',  'price' => 129.99,'stock' => 4,  'seller_id' => $seller1->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sunglasses', 'description' => 'Polarized sunglasses','price' => 39.99, 'stock' => 15, 'seller_id' => $seller1->id, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Belt',       'description' => 'Leather belt',       'price' => 24.99, 'stock' => 12, 'seller_id' => $seller1->id, 'created_at' => now(), 'updated_at' => now()],

        ]);
    }
}
    