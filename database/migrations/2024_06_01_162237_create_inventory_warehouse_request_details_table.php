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
        Schema::create('inventory_warehouse_request_details', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->integer('quantity_current');
            $table->integer('quantity_forwarded')->default(0);
            $table->boolean('confirmed')->default(FALSE);
            $table->boolean('receipt')->default(FALSE);
            $table->unsignedBigInteger('consumable_id');
            $table->unsignedBigInteger('store_room_request_id');
            $table->timestamps();            

            $table->foreign('consumable_id')->references('id')->on('consumables');
            $table->foreign('store_room_request_id')->references('id')->on('inventory_warehouse_requests');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_warehouse_request_details');
    }
};