<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *  Run the migrations.
     */
    public function up(): void
    {
        Schema::create('company_establishment_warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('filter');
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('type_warehouse_id');
            $table->unsignedBigInteger('establishment_id');
            $table->timestamps();

            $table->foreign('type_warehouse_id')->references('id')->on('company_establishment_warehouse_types');
            $table->foreign('establishment_id')->references('id')->on('company_establishments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_establishment_warehouses');
    }
};
