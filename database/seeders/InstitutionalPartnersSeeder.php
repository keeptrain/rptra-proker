<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitutionalPartnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('institutional_partners')->insert([
            [
                'id' => 'MITRA-001',
                'name' => 'MITRA PERTAMA',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'MITRA-002',
                'name' => 'MITRA KE DUA',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'MITRA-003',
                'name' => 'MITRA KE TIGA',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'MITRA-004',
                'name' => 'MITRA KE EMPAT',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'MITRA-005',
                'name' => 'MITRA KE LIMA',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'MITRA-006',
                'name' => 'MITRA KE ENAM',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
