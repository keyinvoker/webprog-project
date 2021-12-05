<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admins:
        User::create([
            'name' => 'Abeng',
            'gender' => 'Male',
            'address' => 'Ssangmun-la, West Korea',
            'email' => 'abeng@westkorea.com',
            'password' => bcrypt('abeng123'),
            'role' => 'Admin'
        ]);

        // Members:
        User::create([
            'name' => 'Joerio',
            'gender' => 'Male',
            'address' => 'Sasageyo, East Korea',
            'email' => 'joerio@eastkorea.com',
            'password' => bcrypt('joerio123'),
            'role' => 'Member'
        ]);
    }
}
