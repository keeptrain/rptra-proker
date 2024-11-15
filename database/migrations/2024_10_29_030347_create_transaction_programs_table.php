<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('main_program_id', length: 50)->nullable(true);
            //$table->string('instituional_partner_id', length: 50)->nullable(true);
            $table->enum('information',['belum_terlaksana', 'terlaksana', 'tidak_terlaksana'])->default('belum_terlaksana');
            $table->timestamps();

            // Foreign key to priority_program (id)
            $table->foreign('main_program_id')
                ->references('id')
                ->on('main_programs')
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
            $table->timestamps();


            $table->foreign('transaction_program_id', 'fk_transaction_program')
                ->references('id')
                ->on('transaction_programs')
                ->onDelete('cascade');
           
                // Menentukan nama constraint secara manual
            $table->foreign('institutional_partner_id', 'fk_institutional_partner') // Menentukan nama constraint secara manual
                ->references('id')
                ->on('institutional_partners')
                ->onDelete('cascade');
          
        });
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
