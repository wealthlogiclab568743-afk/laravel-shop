<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
User::insert([
    ['name' => 'seller1', 'password' => Hash::make('password'), 'role' => 'seller', 'balance' => 0.00, 'created_at' => now(), 'updated_at' => now()],
    ['name' => 'seller2', 'password' => Hash::make('password'), 'role' => 'seller', 'balance' => 0.00, 'created_at' => now(), 'updated_at' => now()],
    ['name' => 'customer1', 'password' => Hash::make('password'), 'role' => 'customer', 'balance' => 1000.00, 'created_at' => now(), 'updated_at' => now()],
    ['name' => 'customer2', 'password' => Hash::make('password'), 'role' => 'customer', 'balance' => 1000.00, 'created_at' => now(), 'updated_at' => now()],
]);

    }
}
