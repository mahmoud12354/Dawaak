<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('medical_name')->nullable();
            $table->date('expired_date')->nullable();
            $table->string('categ')->nullable();
        
            $table->string('full_name')->nullable();
            $table->string('nationalID')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('street_name')->nullable(); // Corrected column name
            $table->string('building_No')->nullable(); // Corrected column name
            $table->string('floor')->nullable();
            $table->string('apartment')->nullable();
            $table->string('land_mark')->nullable(); // Corrected column name
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
