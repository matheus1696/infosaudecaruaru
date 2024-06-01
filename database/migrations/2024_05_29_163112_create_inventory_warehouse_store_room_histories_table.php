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
        Schema::create('inventory_warehouse_store_room_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->string('movement');
            $table->unsignedInteger('consumable_id');
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('establishment_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
            
            $table->foreign('consumable_id')->references('id')->on('consumables');
            $table->foreign('department_id')->references('id')->on('company_establishment_departments');
            $table->foreign('establishment_id')->references('id')->on('company_establishments');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_warehouse_store_room_histories');
    }
};
