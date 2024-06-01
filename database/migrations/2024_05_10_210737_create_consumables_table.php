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
        Schema::create('consumables', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('title');
            $table->string('filter');
            $table->string('description')->nullable();
            $table->boolean('status')->default(TRUE);
            $table->unsignedBigInteger('consumable_classification_id');
            $table->unsignedBigInteger('consumable_unit_id');
            $table->unsignedBigInteger('consumable_type_id');
            $table->timestamps();

            $table->foreign('consumable_classification_id')->references('id')->on('consumable_classifications');
            $table->foreign('consumable_unit_id')->references('id')->on('consumable_units');
            $table->foreign('consumable_type_id')->references('id')->on('consumable_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumables');
    }
};
