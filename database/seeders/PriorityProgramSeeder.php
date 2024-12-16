<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriorityProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('priority_programs')->insert([
            [
                'id' => 'PPRIO-001',
                'name' => 'PKK KELUARGA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'PPRIO-002',
                'name' => 'BKB PAUD',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'PPRIO-003',
                'name' => 'UP2K',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'PPRIO-004',
                'name' => 'HATINYA PKK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'PPRIO-005',
                'name' => 'POSYANDU',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'PPRIO-006',
                'name' => 'SME',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
