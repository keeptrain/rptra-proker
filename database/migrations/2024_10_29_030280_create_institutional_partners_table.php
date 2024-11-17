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
        Schema::create('institutional_partners', function (Blueprint $table) {
            $table->string('id', length: 50)->primary();
            $table->string('name', length: 255);
            $table->timestamps();
        });

        // Insert default records
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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutional_partners');
    }
};
