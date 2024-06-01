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
        Schema::create('medications', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('title');
            $table->string('filter');
            $table->string('description')->nullable();
            $table->boolean('status')->default(TRUE);
            $table->unsignedBigInteger('medication_classification_id')->nullable();
            $table->unsignedBigInteger('medication_unit_id');
            $table->unsignedBigInteger('medication_type_id');
            $table->timestamps();

            $table->foreign('medication_classification_id')->references('id')->on('medication_classifications');
            $table->foreign('medication_unit_id')->references('id')->on('medication_units');
            $table->foreign('medication_type_id')->references('id')->on('medication_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medications');
    }
};
