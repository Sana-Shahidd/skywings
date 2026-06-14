<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Flight Model
    |--------------------------------------------------------------------------
    | This model represents the flights table in database.
    | A flight is a route between two cities.
    | Example: PK-301 flies from Islamabad to Karachi
    */

    // These columns can be filled when creating or updating a flight
    protected $fillable = [
        'flight_name',
        'flight_code',
        'source_city',
        'destination_city',
    ];

    // A flight belongs to a source city (where it departs from)
    public function source()
    {
        return $this->belongsTo(City::class, 'source_city');
    }

    // A flight belongs to a destination city (where it arrives)
    public function destination()
    {
        return $this->belongsTo(City::class, 'destination_city');
    }

    // A flight can have many schedules (different dates and times)
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}