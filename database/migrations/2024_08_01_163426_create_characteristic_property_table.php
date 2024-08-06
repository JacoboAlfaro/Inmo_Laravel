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
        Schema::create('characteristic_properties', function (Blueprint $table) {
            $table->string('value', 100);
            $table->foreignId('characteristic_id')->references('id')->on('characteristics')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('property_id')->references('id')->on('properties')->cascadeOnDelete()->cascadeOnUpdate();
            $table->primary(['characteristic_id', 'property_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characteristic_properties');
    }
};
