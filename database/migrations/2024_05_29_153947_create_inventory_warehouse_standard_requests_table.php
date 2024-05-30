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
        Schema::create('inventory_warehouse_standard_requests', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('consumable_type_id');
            $table->boolean('status')->default(TRUE);
            $table->timestamps();
                        
            $table->foreign('consumable_type_id')->references('id')->on('consumable_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_warehouse_standard_requests');
    }
};
