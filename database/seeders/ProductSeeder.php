<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Bob',
            'description' => 'Bob the Builder built this in the hood',
            'price' => 69000,
            'category_id' => 1,
            'image' => ' '
        ]);
        Product::create([
            'name' => 'Vegana',
            'description' => 'Vegana sent this',
            'price' => 42000,
            'category_id' => 2,
            'image' => ' '
        ]);
        Product::create([
            'name' => 'Razor PC',
            'description' => 'RAZORRRRRR',
            'price' => 5000000,
            'category_id' => 3,
            'image' => ' '
        ]);
    }
}
