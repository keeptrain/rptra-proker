<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'email'=> 'admin',
                'password'=> bcrypt('123'),
                'image' => 'images/profile-default.svg',
            ],
        ]);
    }
}
