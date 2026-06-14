<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'staff_id',
        'phone',
        'designation',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // A user has many bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // A staff member has many checkin logs
    public function checkinLogs()
    {
        return $this->hasMany(CheckinLog::class, 'staff_id');
    }
}