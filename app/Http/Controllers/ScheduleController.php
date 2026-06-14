<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Flight;

class ScheduleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Schedule Controller
    |--------------------------------------------------------------------------
    | This controller handles all CRUD operations for schedules.
    | Admin can Add, View, Edit and Delete schedules.
    | A schedule is a specific date and time for a flight.
    | Example: Flight PK-301 departs on 15 Jan 2024 at 10:00 AM
    */

    // Show all schedules
    public function index()
    {
        // Get all schedules with their flight details
        $schedules = Schedule::with('flight')->latest()->get();
        return view('admin.schedules.index', compact('schedules'));
    }

    // Show form to add a new schedule
    public function create()
    {
        // Get all flights for the dropdown menu
        $flights = Flight::all();
        return view('admin.schedules.create', compact('flights'));
    }

    // Save new schedule to database
    public function store(Request $request)
    {
        // Validate all fields
        $request->validate([
            'flight_id'      => 'required|exists:flights,id',
            'departure_time' => 'required|date',
            'arrival_time'   => 'required|date|after:departure_time',
            'total_seats'    => 'required|integer|min:1',
            'price'          => 'required|numeric|min:0',
        ]);

        // Create the schedule in database
        Schedule::create($request->all());

        return redirect()->route('admin.schedules.index')
               ->with('success', 'Schedule added successfully!');
    }

    // Show form to edit a schedule
    public function edit(Schedule $schedule)
    {
        // Get all flights for the dropdown menu
        $flights = Flight::all();
        return view('admin.schedules.edit', compact('schedule', 'flights'));
    }

    // Update schedule in database
    public function update(Request $request, Schedule $schedule)
    {
        // Validate all fields
        $request->validate([
            'flight_id'      => 'required|exists:flights,id',
            'departure_time' => 'required|date',
            'arrival_time'   => 'required|date|after:departure_time',
            'total_seats'    => 'required|integer|min:1',
            'price'          => 'required|numeric|min:0',
        ]);

        // Update the schedule
        $schedule->update($request->all());

        return redirect()->route('admin.schedules.index')
               ->with('success', 'Schedule updated successfully!');
    }

    // Delete schedule from database
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('admin.schedules.index')
               ->with('success', 'Schedule deleted successfully!');
    }
}