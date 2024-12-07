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
        Schema::create('transaction_programs', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->enum('status', ['draft', 'completed'])->default('draft');
            $table->text('activity')->nullable(true);
            $table->text('objective')->nullable(true);
            $table->text('output')->nullable(true);
            $table->text('target')->nullable(true);
            $table->integer('volume')->nullable(true);
            $table->text('location')->nullable(true);
            $table->dateTime('schedule_activity')->nullable(true);
            $table->string('principal_program_id', length: 50)->nullable(true);
            //$table->string('instituional_partner_id', length: 50)->nullable(true);
            $table->enum('information',['belum_terlaksana', 'terlaksana', 'tidak_terlaksana'])->default('belum_terlaksana');
            $table->timestamps();

            // Foreign key to priority_program (id)
            $table->foreign('principal_program_id')
                ->references('id')
                ->on('principal_programs')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            /* Foreign key to institutional_partners (id)
            $table->foreign('instituional_partner_id')
            ->references('id')
            ->on('institutional_partners')
            ->onUpdate('cascade')
            ->onDelete('cascade');*/
        });


        // Pivot
        Schema::create('institutional_partner_transaction_program', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->unsignedInteger('transaction_program_id')
                ->nullable(true);
            $table->string('institutional_partner_id', 50)
                ->nullable(true);
            //$table->timestamps();


            $table->foreign('transaction_program_id', 'fk_transaction_program')
                ->references('id')
                ->on('transaction_programs')
                ->onDelete('cascade');
           
                // Menentukan nama constraint secara manual
            $table->foreign('institutional_partner_id', 'fk_institutional_partner')
                ->references('id')
                ->on('institutional_partners')
                ->onDelete('cascade');
          
        });

        DB::table('transaction_programs')->insert([
            [
                'id' => '1',
                'status' => 'completed',
                'activity' => '1. Satu',
                'objective' => 'Tujuan pertama',
                'output' => 'Output pertama',
                'target' => 'Sasaran pertama',
                'volume' => '1',
                'location' => 'Duren Sawit, Jakarta Timur',
                'schedule_activity' => '2024-11-01T02:02',
                'principal_program_id' => 'PPOK-001',
                'information' => 'belum_terlaksana',
                'created_at' => '2024-01-01T02:02',
                'updated_at' => now()
            ],
            [
                'id' => '2',
                'status' => 'completed',
                'activity' => '2. Satu',
                'objective' => 'Tujuan kedua',
                'output' => 'Output kedua',
                'target' => 'Sasaran kedua',
                'volume' => '2',
                'location' => 'Kampung Melayu, Jakarta Timur',
                'schedule_activity' => '2024-11-02T02:02',
                'principal_program_id' => 'PPOK-002',
                'information' => 'terlaksana',
                'created_at' => '2024-01-02T02:02',
                'updated_at' => now()
            ],
            [
                'id' => '3',
                'status' => 'completed',
                'activity' => '1.Satu 2.Dua 3.Tiga',
                'objective' => 'Tujuan ketiga',
                'output' => 'Output ketiga',
                'target' => 'Sasaran ketiga',
                'volume' => '3',
                'location' => 'Tebet, Jakarta Timur',
                'schedule_activity' => '2024-11-03T02:02',
                'principal_program_id' => 'PPOK-003',
                'information' => 'tidak_terlaksana',
                'created_at' => '2024-02-01T02:02',
                'updated_at' => now()
            ],
            [
                'id' => '4',
                'status' => 'draft',
                'activity' => '',
                'objective' => 'Tujuan draft',
                'output' => 'Output draft',
                'target' => null,
                'volume' => '4',
                'location' => 'Jakarta Barat',
                'schedule_activity' => null,
                'principal_program_id' => 'PPOK-004',
                'information' => 'belum_terlaksana',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '5',
                'status' => 'draft',
                'activity' => null,
                'objective' => 'Tujuan draft kedua',
                'output' => 'Output draft kedua',
                'target' => null,
                'volume' => '5',
                'location' => 'Jakarta Utara',
                'schedule_activity' => null,
                'principal_program_id' => 'PPOK-005',
                'information' => 'terlaksana',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '6',
                'status' => 'draft',
                'activity' => null,
                'objective' => 'Tujuan draft kedua',
                'output' => 'Output draft kedua',
                'target' => null,
                'volume' => '6',
                'location' => 'Jakarta Selatan',
                'schedule_activity' => null,
                'principal_program_id' => 'PPOK-006',
                'information' => 'tidak_terlaksana',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '7',
                'status' => 'draft',
                'activity' => null,
                'objective' => 'Tujuan draft ketiga',
                'output' => 'Output draft ketiga',
                'target' => null,
                'volume' => '7',
                'location' => 'Jakarta Selatan',
                'schedule_activity' => null,
                'principal_program_id' => 'PPOK-007',
                'information' => 'belum_terlaksana',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '8',
                'status' => 'completed',
                'activity' => 'null',
                'objective' => 'Tujuan completed kedelapan',
                'output' => 'Output completed kedelapan',
                'target' => 'Tujuan completed kedelapan',
                'volume' => '7',
                'location' => 'Jakarta Selatan',
                'schedule_activity' => '2024-11-03T02:02',
                'principal_program_id' => 'PPOK-007',
                'information' => 'belum_terlaksana',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_programs');
        Schema::dropIfExists('institutional_partner_transaction_program');
    }
};
