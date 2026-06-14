<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * This seeder creates a default admin account in the database.
     * Run this once so you can login as admin immediately.
     * Admin email: admin@skywings.com
     * Admin password: admin123
     */
    public function run(): void
    {
        // Create the admin user
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@skywings.com',
            // Hash::make() encrypts the password for security
            'password' => Hash::make('admin123'),
            // Set role to admin so this user gets admin access
            'role'     => 'admin',
        ]);
    }
}