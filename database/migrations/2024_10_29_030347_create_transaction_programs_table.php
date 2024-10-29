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
            $table->string('id', length: 50)->primary();
            $table->text('activity');
            $table->text('objective');
            $table->text('output');
            $table->text('target');
            $table->integer('volume');
            $table->dateTime('schedule_activity');
            $table->string('main_program_id', length: 50);
            $table->string('instituional_partners_id', length: 50);
            $table->enum('information',['belum terlaksana', 'terlaksana', 'tidak terlaksana']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_programs');
    }
};
