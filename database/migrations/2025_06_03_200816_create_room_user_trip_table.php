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
      Schema::create('room_user_trip', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_trip_id')->constrained('user_trip')->onDelete('cascade');
    $table->foreignId('room_id')->constrained()->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_user_trip');
    }
};
