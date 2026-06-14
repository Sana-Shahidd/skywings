<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * This model represents the cities table in database.
     * Cities are used as departure and arrival locations for flights.
     * Example cities: Karachi, Lahore, Islamabad, Dubai
     */

    // These columns can be filled when creating/updating a city
    protected $fillable = [
        'name', // Name of the city e.g. Karachi
    ];

    /**
     * A city can be the source of many flights.
     * Example: Many flights depart FROM Karachi
     */
    public function sourceFlights()
    {
        return $this->hasMany(Flight::class, 'source_city');
    }

    /**
     * A city can be the destination of many flights.
     * Example: Many flights arrive IN Lahore
     */
    public function destinationFlights()
    {
        return $this->hasMany(Flight::class, 'destination_city');
    }
}