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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('passport_number');
            $table->string('airline');
            $table->string('departure_time');
            $table->string('arrival_time');
            $table->string('departure_airport');
            $table->string('arrival_airport');
            $table->date('date_flight');
            $table->string('seat_number');
            $table->string('ticket_price');
            $table->string('allowed_baggage');
            $table->enum('flight_status', ['On time', 'delayed','canceled'])->default('On time');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
