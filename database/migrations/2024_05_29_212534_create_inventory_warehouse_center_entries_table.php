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
        Schema::create('inventory_warehouse_center_entries', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->string('supply_order');
            $table->string('supply_order_parcel');
            $table->string('supply_company');
            $table->integer('quantity')->nullable();
            $table->integer('quantity_minimum')->nullable();
            $table->integer('quantity_maximum')->nullable();
            $table->unsignedBigInteger('consumable_id');
            $table->unsignedBigInteger('establishment_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('financial_block_id');
            $table->timestamps();
            
            $table->foreign('consumable_id')->references('id')->on('consumables');
            $table->foreign('establishment_id')->references('id')->on('company_establishments');
            $table->foreign('department_id')->references('id')->on('company_establishment_departments');
            $table->foreign('financial_block_id')->references('id')->on('company_financial_blocks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_warehouse_center_entries');
    }
};
