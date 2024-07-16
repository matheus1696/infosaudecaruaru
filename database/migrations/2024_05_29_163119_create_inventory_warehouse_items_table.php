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
        Schema::create('inventory_warehouse_items', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->integer('quantity_minimum')->nullable();
            $table->integer('quantity_maximum')->nullable();
            $table->unsignedInteger('consumable_id');
            $table->unsignedInteger('warehouse_id');
            $table->unsignedInteger('establishment_id');
            $table->unsignedInteger('financial_block_id');
            $table->timestamps();

            $table->foreign('consumable_id')->references('id')->on('consumables');
            $table->foreign('warehouse_id')->references('id')->on('company_establishment_warehouses');
            $table->foreign('establishment_id')->references('id')->on('company_establishments');
            $table->foreign('financial_block_id')->references('id')->on('company_financial_blocks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_warehouse_items');
    }
};
