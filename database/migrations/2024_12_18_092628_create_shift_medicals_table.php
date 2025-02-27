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
        Schema::create('shift_medicals', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_date'); // Data do plantão
            $table->dateTime('end_date'); // Data do plantão
            $table->unsignedBigInteger('doctor_id'); // Profissional Médico
            $table->unsignedBigInteger('establishment_id'); // Relacionado à unidade
            $table->timestamps();

            $table->foreign('doctor_id')->references('id')->on('professional_doctors');
            $table->foreign('establishment_id')->references('id')->on('company_establishments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shift_medicals');
    }
};
