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
        Schema::create('procedures', function (Blueprint $table) {
            $table->id();
        $table->text('paper_work')->nullable(); // ممكن مستندات نصية أو JSON
        $table->string('passport_photo')->nullable(); // مسار الصورة
        $table->string('mobile_number'); // رقم الهاتف
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procedures');
    }
};
