<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Booking Model
    |--------------------------------------------------------------------------
    | This model represents the bookings table in database.
    | A booking is created when a user books a flight ticket.
    | Each booking gets a unique PNR code.
    | Status can be:
    | - 'booked'     = ticket is confirmed
    | - 'cancelled'  = user cancelled the ticket
    | - 'checked-in' = staff verified and checked in passenger
    */

    // These columns can be filled when creating or updating a booking
    protected $fillable = [
        'user_id',
        'schedule_id',
        'pnr_code',
        'status',
        'booking_date',
    ];

    // A booking belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A booking belongs to one schedule
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    // A booking can have one checkin log
    public function checkinLog()
    {
        return $this->hasOne(CheckinLog::class);
    }
}