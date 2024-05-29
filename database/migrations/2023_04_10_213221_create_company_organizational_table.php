<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *  Run the migrations.
     */
    public function up(): void
    {
        Schema::create('company_organizations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('acronym');
            $table->string('filter');
            $table->text('description')->nullable();
            $table->integer('linked_users')->default(0)->nullable();
            $table->boolean('status')->default(true);
            $table->string('order')->nullable();
            $table->integer('hierarchy');            
            $table->string('number_hierarchy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_organizations');
    }
};
