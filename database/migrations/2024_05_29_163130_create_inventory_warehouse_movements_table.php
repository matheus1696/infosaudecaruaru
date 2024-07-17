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
        Schema::create('inventory_warehouse_moviments', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->nullable();
            $table->string('supply_order')->nullable();
            $table->string('supply_order_parcel')->nullable();
            $table->unsignedBigInteger('supply_company_id')->nullable();
            $table->integer('quantity');
            $table->string('movement');
            $table->unsignedInteger('consumable_id');
            $table->unsignedInteger('incoming_warehouse_id');
            $table->unsignedInteger('incoming_establishment_id');
            $table->unsignedInteger('output_warehouse_id')->nullable();
            $table->unsignedInteger('output_establishment_id')->nullable();
            $table->unsignedInteger('financial_block_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->timestamps();
            
            $table->foreign('supply_company_id')->references('id')->on('supply_companies');
            $table->foreign('consumable_id')->references('id')->on('consumables');
            $table->foreign('incoming_warehouse_id')->references('id')->on('company_establishment_warehouses');
            $table->foreign('incoming_establishment_id')->references('id')->on('company_establishments');
            $table->foreign('output_warehouse_id')->references('id')->on('company_establishment_warehouses');
            $table->foreign('output_establishment_id')->references('id')->on('company_establishments');
            $table->foreign('financial_block_id')->references('id')->on('company_financial_blocks');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_warehouse_moviments');
    }
};
