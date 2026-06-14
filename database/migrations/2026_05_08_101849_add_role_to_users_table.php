<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * This migration adds a 'role' column to the users table.
     * The role column tells the system what type of user this is.
     * There are 3 roles:
     * - 'admin'  → can manage everything
     * - 'user'   → passenger who books tickets
     * - 'staff'  → airline staff who verifies tickets
     * Default role is 'user' so every new registration is a passenger.
     */

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add role column after the 'email' column
            // Default value is 'user' so new registrations are passengers
            $table->string('role')->default('user')->after('email');
        });
    }

    public function down(): void
    {
        // This removes the role column if we undo this migration
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};