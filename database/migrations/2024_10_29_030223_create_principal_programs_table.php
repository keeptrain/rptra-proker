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
        Schema::create('principal_programs', function (Blueprint $table) {
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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('principal_programs');
    }
};
