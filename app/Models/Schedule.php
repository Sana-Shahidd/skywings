<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * This model represents the schedules table in database.
     * A schedule is a specific date and time for a flight.
     * Example: Flight PK-301 departs on 15 Jan 2024 at 10:00 AM
     * One flight can have many schedules (different dates/times)
     */

    // These columns can be filled when creating/updating a schedule
    protected $fillable = [
        'flight_id',       // Which flight this schedule belongs to
        'departure_time',  // Date and time of departure
        'arrival_time',    // Date and time of arrival
        'total_seats',     // How many seats are available
        'price',           // Ticket price for this schedule
    ];

    /**
     * A schedule belongs to one flight.
     * Example: This Monday schedule belongs to flight PK-301
     */
    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    /**
     * A schedule can have many bookings.
     * Example: 50 passengers booked this specific schedule
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}