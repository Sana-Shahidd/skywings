<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckinLog extends Model
{
    /**
     * This model represents the checkin_logs table in database.
     * A checkin log is created when airline staff verifies
     * a passenger's ticket at the airport.
     * Example: Staff member Sara verified Ahmed's ticket
     * and marked him as checked in on 15 Jan 2024
     */

    // These columns can be filled when creating a checkin log
    protected $fillable = [
        'booking_id',   // Which booking was checked in
        'staff_id',     // Which staff member did the check in
        'checkin_date', // Date when passenger was checked in
    ];

    /**
     * A checkin log belongs to one booking.
     * Example: This checkin belongs to Ahmed's booking
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    /**
     * A checkin log belongs to one staff member.
     * Example: This checkin was done by staff member Sara
     */
    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}