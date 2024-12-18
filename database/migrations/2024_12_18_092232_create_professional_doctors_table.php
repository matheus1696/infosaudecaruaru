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
        Schema::create('professional_doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('filter');
            $table->string('crm')->unique(); // Registro médico único
            $table->string('specialty'); // Especialidade médica
            $table->string('contact_1')->nullable();
            $table->string('contact_2')->nullable();
            $table->string('status')->default(TRUE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professional_doctors');
    }
};
