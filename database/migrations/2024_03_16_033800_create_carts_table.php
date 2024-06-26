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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('product_title')->nullable();
            $table->string('quantity')->nullable();
            $table->string('Total')->nullable();
            $table->string('city')->nullable();
            $table->string('street_name')->nullable();
            $table->string('bluid_No')->nullable();
            $table->string('floor')->nullable();
            $table->string('apartment')->nullable();
            $table->string('landmark')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
