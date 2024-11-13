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
        Schema::create('fleet_vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->string('license_plate');
            $table->string('color');
            $table->integer('year_manufacture');
            $table->integer('year_models');
            $table->string('owner_status');
            $table->integer('inicial_odometer');
            $table->integer('current_odometer');
            $table->unsignedBigInteger('establishment_id')->nullable();
            $table->string('status')->default('Ativo');
            $table->timestamps();

            $table->foreign('model_id')->references('id')->on('fleet_models');
            $table->foreign('establishment_id')->references('id')->on('company_establishments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fleet_vehicles');
    }
};
