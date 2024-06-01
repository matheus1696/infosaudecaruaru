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
        Schema::create('inventory_warehouse_standard_request_lists', function (Blueprint $table) {
            $table->id();
            $table->string('quantity');
            $table->unsignedInteger('consumable_id');
            $table->unsignedInteger('standard_request_id');
            $table->timestamps();

            $table->foreign('consumable_id')->references('id')->on('consumables');
            $table->foreign('standard_request_id')->references('id')->on('inventory_warehouse_standard_requests');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_warehouse_standard_request_lists');
    }
};
