<?php

namespace Database\Seeders;

use App\Models\Product;
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
        Product::create([
            'name' => 'Samsung 4K TV',
            'category_id' => 1,
            'picture' => 'default_product.jpg',
            'description' => 'Samsung 4K TV with Full HD resolution and ultra HD picture quality',
            'price' => 5000000,
        ]);
        Product::create([
            'name' => 'LG 4K TV',
            'picture' => 'default_product.jpg',
            'category_id' => 1,
            'description' => 'LG 4K TV with Full HD resolution and ultra HD picture quality',
            'price' => 6000000,
        ]);
        Product::create([
            'name' => 'Macbook Pro',
            'picture' => 'default_product.jpg',
            'category_id' => 2,
            'description' => 'Macbook Pro with 16GB RAM and 1TB SSD',
            'price' => 10000000,
        ]);
        Product::create([
            'name' => 'Macbook Air',
            'picture' => 'default_product.jpg',
            'category_id' => 2,
            'description' => 'Macbook Air with 8GB RAM and 512GB SSD',
            'price' => 8000000,
        ]);
        Product::create([
            'name' => 'iPhone X',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone X with 64GB RAM and 256GB SSD',
            'price' => 8000000,
        ]);
        Product::create([
            'name' => 'iPhone 8',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone 8 with 64GB RAM and 128GB SSD',
            'price' => 7000000,
        ]);
        Product::create([
            'name' => 'iPhone 7',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone 7 with 32GB RAM and 128GB SSD',
            'price' => 6000000,
        ]);
        Product::create([
            'name' => 'iPhone 6',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone 6 with 16GB RAM and 64GB SSD',
            'price' => 5000000,
        ]);
        Product::create([
            'name' => 'iPhone 5',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone 5 with 16GB RAM and 32GB SSD',
            'price' => 4000000,
        ]);
        Product::create([
            'name' => 'iPhone 4',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone 4 with 16GB RAM and 32GB SSD',
            'price' => 3000000,
        ]);
        Product::create([
            'name' => 'iPhone 3',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone 3 with 16GB RAM and 32GB SSD',
            'price' => 2000000,
        ]);
        Product::create([
            'name' => 'iPhone 2',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone 2 with 16GB RAM and 32GB SSD',
            'price' => 1000000,
        ]);
        Product::create([
            'name' => 'iPhone 1',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone 1 with 16GB RAM and 32GB SSD',
            'price' => 500000,
        ]);
        Product::create([
            'name' => 'iPhone XR',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone XR with 64GB RAM and 256GB SSD',
            'price' => 8000000,
        ]);
        Product::create([
            'name' => 'iPhone XS',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone XS with 64GB RAM and 256GB SSD',
            'price' => 8000000,
        ]);
        Product::create([
            'name' => 'iPhone XS Max',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Iphone XS Max with 64GB RAM and 256GB SSD',
            'price' => 8000000,
        ]);
        Product::create([
            'name' => 'XiaoMi Mi 8',
            'picture' => 'default_product.jpg',
            'category_id' => 3,
            'description' => 'Xiaomi Mi 8 with 64GB RAM and 256GB SSD',
            'price' => 8000000,
        ]);
    }
}
