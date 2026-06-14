<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
    |--------------------------------------------------------------------------
    | Add Staff Fields to Users Table
    |--------------------------------------------------------------------------
    | This migration adds extra fields to the users table for staff members.
    | Admin will fill these when creating a staff account.
    | Fields added:
    | - staff_id      → unique ID assigned by admin e.g. SW-001
    | - phone         → staff phone number
    | - designation   → staff job title e.g. Check-in Officer
    | - is_active     → whether staff account is active or not
    */

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Unique staff ID assigned by admin
            $table->string('staff_id')->nullable()->after('role');
            // Staff phone number
            $table->string('phone')->nullable()->after('staff_id');
            // Staff designation/job title
            $table->string('designation')->nullable()->after('phone');
            // Whether staff is active or suspended
            $table->boolean('is_active')->default(true)->after('designation');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['staff_id', 'phone', 'designation', 'is_active']);
        });
    }
};