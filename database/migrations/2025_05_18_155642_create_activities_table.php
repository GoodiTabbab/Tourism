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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('time');
            $table->date('date');
            $table->string('equipment');
            $table->enum('equipment_availability', ['available for rent', 'must be brought personally'])->default('must be brought personally');
            $table->enum('age_group', ['children', 'adults','all ages'])->default('all ages');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
