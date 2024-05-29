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
        Schema::create('company_establishment_departments', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->string('filter');
            $table->string('contact')->nullable();
            $table->string('extension')->nullable();
            $table->string('type_contact')->nullable()->default('Without');
            $table->unsignedBigInteger('establishment_id');
            $table->boolean('has_inventory_warehouse')->default(false);
            $table->boolean('has_inventory_warehouse_center')->default(false);
            $table->boolean('has_inventory_pharmacy')->default(false);
            $table->boolean('has_inventory_pharmacy_center')->default(false);
            $table->timestamps();

            $table->foreign('establishment_id')->references('id')->on('company_establishments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_establishment_departments');
    }
};
