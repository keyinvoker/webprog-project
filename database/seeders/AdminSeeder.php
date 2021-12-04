<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'full_name' => 'Abeng',
            'gender' => 'Male',
            'address' => 'Ssangmun-la, West Korea',
            'email' => 'abeng@westkorea.com',
            'password' => bcrypt('abeng123')
        ]);
    }
}
