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
        Schema::create('inventory_warehouse_requests', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('title')->nullable();
            $table->string('department_contact')->nullable();
            $table->string('department_extension')->nullable();
            $table->string('user_contact_1')->nullable();
            $table->string('user_contact_2')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('inventory_warehouse_request_statuses');
            $table->foreign('department_id')->references('id')->on('company_establishment_departments');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_warehouse_requests');
    }
};
