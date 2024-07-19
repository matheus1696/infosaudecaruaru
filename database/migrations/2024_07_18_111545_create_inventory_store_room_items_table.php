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
        Schema::create('inventory_store_room_items', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->integer('quantity_minimum')->nullable();
            $table->integer('quantity_maximum')->nullable();
            $table->unsignedBigInteger('consumable_id');
            $table->unsignedBigInteger('inventory_store_room_id');
            $table->timestamps();

            $table->foreign('consumable_id')->references('id')->on('consumables');
            $table->foreign('inventory_store_room_id')->references('id')->on('inventory_store_rooms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_store_room_items');
    }
};
