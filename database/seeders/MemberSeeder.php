<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create([
            'full_name' => 'Joerio',
            'gender' => 'Male',
            'address' => 'Sasageyo, East Korea',
            'email' => 'joerio@eastkorea.com',
            'password' => bcrypt('joerio123')
        ]);
    }
}
