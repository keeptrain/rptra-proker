<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            PriorityProgramSeeder::class,
            PrincipalProgramSeeder::class,
            InstitutionalPartnersSeeder::class,
            TransactionProgramSeeder::class,
            InstitutionalPartnersTransactionsSeeder::class,
        ]);
    }
}
