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
        Schema::create('characteristic_property', function (Blueprint $table) {
            $table->id();
            $table->string('value', 100);
            $table->foreignId('characteristic_id')->nullable()->references('id')->on('characteristics')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('property_id')->nullable()->references('id')->on('properties')->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characteristic_property');
    }
};