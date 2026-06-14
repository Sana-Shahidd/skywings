<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class StaffSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'        => 'Airline Staff',
            'email'       => 'staff@skywings.com',
            'password'    => Hash::make('staff123'),
            'role'        => 'staff',
            'staff_id'    => 'SW-001',
            'phone'       => '0300-1234567',
            'designation' => 'Check-in Officer',
            'is_active'   => true,
        ]);
    }
}