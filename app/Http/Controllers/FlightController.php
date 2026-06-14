<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\City;

class FlightController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Flight Controller
    |--------------------------------------------------------------------------
    | This controller handles all CRUD operations for flights.
    | Admin can Add, View, Edit and Delete flights.
    | A flight is a route between two cities.
    | Example: PK-301 flies from Islamabad to Karachi
    */

    // Show all flights
    public function index()
    {
        // Get all flights with their source and destination cities
        $flights = Flight::with(['source', 'destination'])->latest()->get();
        return view('admin.flights.index', compact('flights'));
    }

    // Show form to add a new flight
    public function create()
    {
        // Get all cities for the dropdown menus
        $cities = City::all();
        return view('admin.flights.create', compact('cities'));
    }

    // Save new flight to database
    public function store(Request $request)
    {
        // Validate all fields are filled
        $request->validate([
            'flight_name'      => 'required|string|max:255',
            'flight_code'      => 'required|string|max:255',
            'source_city'      => 'required|exists:cities,id',
            'destination_city' => 'required|exists:cities,id',
        ]);

        // Create the flight in database
        Flight::create($request->all());

        return redirect()->route('admin.flights.index')
               ->with('success', 'Flight added successfully!');
    }

    // Show form to edit a flight
    public function edit(Flight $flight)
    {
        // Get all cities for the dropdown menus
        $cities = City::all();
        return view('admin.flights.edit', compact('flight', 'cities'));
    }

    // Update flight in database
    public function update(Request $request, Flight $flight)
    {
        // Validate all fields are filled
        $request->validate([
            'flight_name'      => 'required|string|max:255',
            'flight_code'      => 'required|string|max:255',
            'source_city'      => 'required|exists:cities,id',
            'destination_city' => 'required|exists:cities,id',
        ]);

        // Update the flight
        $flight->update($request->all());

        return redirect()->route('admin.flights.index')
               ->with('success', 'Flight updated successfully!');
    }

    // Delete flight from database
    public function destroy(Flight $flight)
    {
        $flight->delete();
        return redirect()->route('admin.flights.index')
               ->with('success', 'Flight deleted successfully!');
    }
}