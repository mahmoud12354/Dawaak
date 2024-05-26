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
        Schema::create('roshetas', function (Blueprint $table) {
            $table->id();

            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            
            $table->string('city')->nullable();
            $table->string('Street_Name')->nullable();
            $table->string('bluiding_No')->nullable();
            $table->string('floor')->nullable();
            $table->string('apartment')->nullable();
            $table->string('land_mark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roshetas');
    }
};
