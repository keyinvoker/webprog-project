<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Television'
        ]);
        Category::create([
            'name' => 'Laptop'
        ]);
        Category::create([
            'name' => 'Smartphone'
        ]);
    }
}
