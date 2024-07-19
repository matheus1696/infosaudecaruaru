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
        Schema::create('inventory_store_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->boolean('status')->default(TRUE);
            $table->unsignedBigInteger('establishment_id');
            $table->timestamps();

            $table->foreign('establishment_id')->references('id')->on('company_establishments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_store_rooms');
    }
};
