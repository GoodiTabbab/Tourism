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
        Schema::create('cottages', function (Blueprint $table) {
            $table->id();
            $table->string('capacity');
            $table->string('view');
            $table->string('price_cottages');
            $table->string('amenities');
            $table->enum('status', ['Active', 'Non Active'])->default('Active');
            $table->string('ratings');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cottages');
    }
};
