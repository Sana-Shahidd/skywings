<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | City Controller
    |--------------------------------------------------------------------------
    | This controller handles all CRUD operations for cities.
    | Admin can Add, View, Edit and Delete cities.
    | Cities are used as departure and arrival locations for flights.
    */

    // Show all cities
    public function index()
    {
        // Get all cities from database
        $cities = City::latest()->get();
        return view('admin.cities.index', compact('cities'));
    }

    // Show form to add a new city
    public function create()
    {
        return view('admin.cities.create');
    }

    // Save new city to database
    public function store(Request $request)
    {
        // Validate - city name is required
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        // Create the city in database
        City::create([
            'name' => $request->name
        ]);

        // Go back to cities list with success message
        return redirect()->route('admin.cities.index')
               ->with('success', 'City added successfully!');
    }

    // Show form to edit a city
    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }

    // Update city in database
    public function update(Request $request, City $city)
    {
        // Validate - city name is required
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        // Update the city
        $city->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.cities.index')
               ->with('success', 'City updated successfully!');
    }

    // Delete city from database
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('admin.cities.index')
               ->with('success', 'City deleted successfully!');
    }
}