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
        Schema::create('main_programs', function (Blueprint $table) {
            $table->string('id', length: 50)->primary();
            $table->string('priority_program_id', length: 50);
            $table->string('name', length: 255);
            $table->timestamps();

            // Foreign key to priority_program (id)
            $table->foreign('priority_program_id')
                ->references('id')
                ->on('priority_programs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        
         // Insert default records
         DB::table('main_programs')->insert([
            [
                'id' => 'PPOK-001',
                'priority_program_id' => 'PPRIO-001',
                'name' => 'Penghayatan dan Pengamalan Pancasila',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'PPOK-002',
                'priority_program_id' => 'PPRIO-001',
                'name' => 'Gotong Royong',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'PPOK-003',
                'priority_program_id' => 'PPRIO-002',
                'name' => 'Pendidikan dan Keterampilan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'PPOK-004',
                'priority_program_id' => 'PPRIO-003',
                'name' => 'Hidup Berkoperasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'PPOK-005',
                'priority_program_id' => 'PPRIO-004',
                'name' => 'Pangan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'PPOK-006',
                'priority_program_id' => 'PPRIO-004',
                'name' => 'Sandang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'PPOK-007',
                'priority_program_id' => 'PPRIO-004',
                'name' => 'Perumahan dan Tata laksana Rumah Tangga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'PPOK-008',
                'priority_program_id' => 'PPRIO-005',
                'name' => 'Kesehatan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'PPOK-009',
                'priority_program_id' => 'PPRIO-005',
                'name' => 'Kelestarian Lingkungan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'PPOK-010',
                'priority_program_id' => 'PPRIO-005',
                'name' => 'Perencanaan Sehat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'PPOK-011',
                'priority_program_id' => 'PPRIO-006',
                'name' => 'Kesekretariatan',
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
        Schema::dropIfExists('main_programs');
    }
};
