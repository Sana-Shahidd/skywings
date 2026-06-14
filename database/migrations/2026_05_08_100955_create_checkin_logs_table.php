<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('checkin_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings');
            $table->foreignId('staff_id')->constrained('users');
            $table->date('checkin_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('checkin_logs');
    }
};