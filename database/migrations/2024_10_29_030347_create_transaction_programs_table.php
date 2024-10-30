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
            $table->string('instituional_partner_id', length: 50);
            $table->enum('information',['belum terlaksana', 'terlaksana', 'tidak terlaksana']);
            $table->timestamps();

            // Foreign key to priority_program (id)
            $table->foreign('main_program_id')
                ->references('id')
                ->on('main_programs')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            // Foreign key to institutional_partners (id)
            $table->foreign('instituional_partner_id')
            ->references('id')
            ->on('institutional_partners')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
