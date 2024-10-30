<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('priority_programs', function (Blueprint $table) {
            $table->string('id', length:50)->primary();
            $table->string('name', length: 255);
            $table->timestamps();
        });

        // Insert default records
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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('priority_programs');
    }
};
