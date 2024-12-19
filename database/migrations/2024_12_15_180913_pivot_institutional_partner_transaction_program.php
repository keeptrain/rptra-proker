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
        Schema::create('institutional_partner_transaction_program', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->unsignedInteger('transaction_program_id')->nullable(true);
            $table->string('institutional_partner_id', 50)->nullable(true);
            //$table->timestamps();

            $table->foreign('transaction_program_id', 'fk_transaction_program')->references('id')->on('transaction_programs')->onDelete('cascade');

            // Menentukan nama constraint secara manual
            $table->foreign('institutional_partner_id', 'fk_institutional_partner')->references('id')->on('institutional_partners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutional_partner_transaction_program');
    }
};
