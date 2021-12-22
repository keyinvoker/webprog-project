<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Samsung 4K TV',
            'category_id' => 1,
            'picture' => 'default_product.jpg',
            'description' => 'Samsung 4K TV with Full HD resolution and ultra HD picture quality',
            'price' => 5000000,
        ]);
        DB::table('products')->insert([
            'name' => 'LG 4K TV',
            'picture' => 'default_product.jpg',
            'category_id' => 1,
            'description' => 'LG 4K TV with Full HD resolution and ultra HD picture quality',
            'price' => 6000000,
        ]);
        DB::table('products')->insert([
            'name' => 'Macbook Pro',
            'picture' => 'default_product.jpg',
            'category_id' => 2,
            'description' => 'Macbook Pro with 16GB RAM and 1TB SSD',
            'price' => 10000000,
        ]);
        DB::table('products')->insert([
            'name' => 'Macbook Air',
            'picture' => 'default_product.jpg',
            'category_id' => 2,
            'description' => 'Macbook Air with 8GB RAM and 512GB SSD',
            'price' => 8000000,
        ]);
        DB::table('products')->insert([
            'name' => 'Iphone X',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone X with 64GB RAM and 256GB SSD',
            'price' => 8000000,
        ]);
        DB::table('products')->insert([
            'name' => 'Iphone 8',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone 8 with 64GB RAM and 128GB SSD',
            'price' => 7000000,
        ]);
        DB::table('products')->insert([
            'name' => 'Iphone 7',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone 7 with 32GB RAM and 128GB SSD',
            'price' => 6000000,
        ]);
        DB::table('products')->insert([
            'name' => 'Iphone 6',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone 6 with 16GB RAM and 64GB SSD',
            'price' => 5000000,
        ]);
        DB::table('products')->insert([
            'name' => 'Iphone 5',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone 5 with 16GB RAM and 32GB SSD',
            'price' => 4000000,
        ]);
        DB::table('products')->insert([
            'name' => 'Iphone 4',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone 4 with 16GB RAM and 32GB SSD',
            'price' => 3000000,
        ]);
        DB::table('products')->insert([
            'name' => 'Iphone 3',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone 3 with 16GB RAM and 32GB SSD',
            'price' => 2000000,
        ]);
        DB::table('products')->insert([
            'name' => 'Iphone 2',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone 2 with 16GB RAM and 32GB SSD',
            'price' => 1000000,
        ]);
        DB::table('products')->insert([
            'name' => 'Iphone 1',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone 1 with 16GB RAM and 32GB SSD',
            'price' => 500000,
        ]);
        DB::table('products')->insert([
            'name' => 'Iphone XR',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone XR with 64GB RAM and 256GB SSD',
            'price' => 8000000,
        ]);
        DB::table('products')->insert([
            'name' => 'Iphone XS',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone XS with 64GB RAM and 256GB SSD',
            'price' => 8000000,
        ]);
        DB::table('products')->insert([
            'name' => 'Iphone XS Max',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone XS Max with 64GB RAM and 256GB SSD',
            'price' => 8000000,
        ]);
        DB::table('products')->insert([
            'name' => 'Xiaomi Mi 8',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Xiaomi Mi 8 with 64GB RAM and 256GB SSD',
            'price' => 8000000,
        ]); 

    }
}
