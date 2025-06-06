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
    Schema::create('user_trip_procedures', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_trip_id')->constrained('user_trip')->onDelete('cascade');
    $table->foreignId('procedure_id')->constrained('procedures')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
