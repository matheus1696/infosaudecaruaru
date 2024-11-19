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
        Schema::create('fleet_odometers', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('hour');
            $table->string('odometer');
            $table->float('value_unit')->nullable();
            $table->float('value_total')->nullable();
            $table->string('category_service'); // Cadastros de Abastecimento, Vistoria, Serviços e Despesas
            $table->string('category_description'); // Tipo de Combustível, Vistorias, Serviços e Despesas
            $table->string('establishment')->nullable(); //Posto, Oficina, Local da Despesa
            $table->string('driver')->nullable();
            $table->string('motive')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('vehicle_id');
            $table->timestamps();

            $table->foreign('vehicle_id')->references('id')->on('fleet_vehicles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fleet_odometers');
    }
};
