<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitutionalPartnersTransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('institutional_partner_transaction_program')->insert([
            [
                'id' => '1',
                'transaction_program_id' => '1',
                'institutional_partner_id' => 'MITRA-001',
            ],
            [
                'id' => '2',
                'transaction_program_id' => '2',
                'institutional_partner_id' => 'MITRA-001',
            ],
            [
                'id' => '3',
                'transaction_program_id' => '2',
                'institutional_partner_id' => 'MITRA-002',
            ],
            [
                'id' => '4',
                'transaction_program_id' => '3',
                'institutional_partner_id' => 'MITRA-001',
            ],
            [
                'id' => '5',
                'transaction_program_id' => '3',
                'institutional_partner_id' => 'MITRA-002',
            ],
            [
                'id' => '6',
                'transaction_program_id' => '3',
                'institutional_partner_id' => 'MITRA-003',
            ],
            [
                'id' => '7',
                'transaction_program_id' => '7',
                'institutional_partner_id' => 'MITRA-003',
            ],
        ]);
    }
}