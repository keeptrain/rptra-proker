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
        Schema::create('main_programs', function (Blueprint $table) {
            $table->string('id', length: 50)->primary();
            $table->string('priority_program_id', length: 50);
            $table->string('name', length: 255);
            $table->timestamps();

            // Foreign key to priority_program (id)
            $table->foreign('priority_program_id')
                ->references('id')
                ->on('program_prioritas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_programs');
    }
};
