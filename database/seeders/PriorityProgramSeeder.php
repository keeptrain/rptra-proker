<?php

namespace Database\Seeders;

use App\Models\Priority_program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriorityProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Priority_program::create([
            'id' => 'PPRIO-001',
            'name' => '',
            
        ],);
    }
}
