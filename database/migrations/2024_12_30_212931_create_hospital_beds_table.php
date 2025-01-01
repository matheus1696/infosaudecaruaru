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
        Schema::create('hospital_beds', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('title');
            $table->boolean('status')->default(TRUE);
            $table->unsignedInteger('operational_status_id');
            $table->unsignedInteger('classification_id');
            $table->unsignedInteger('establishment_id');
            $table->timestamps();

            $table->foreign('operational_status_id')->references('id')->on('hospital_bed_statuses');
            $table->foreign('classification_id')->references('id')->on('hospital_bed_classifications');
            $table->foreign('establishment_id')->references('id')->on('company_establishments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_beds');
    }
};
