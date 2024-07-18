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
        Schema::create('supply_companies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('surname')->nullable();
            $table->string('cnpj')->unique();
            $table->string('filter');
            $table->string('address');
            $table->string('number');
            $table->string('district');
            $table->unsignedBigInteger('city_id');
            $table->string('contact_1')->nullable();
            $table->string('contact_2')->nullable();
            $table->string('email_1')->nullable();
            $table->string('email_2')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('region_cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supply_companies');
    }
};
