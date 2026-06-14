<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Schedule;
use App\Models\City;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Booking Controller
    |--------------------------------------------------------------------------
    | This controller handles everything for the User Module.
    | Users can search flights, book tickets, view e-tickets
    | and cancel bookings.
    */

    // Show user dashboard
    public function dashboard()
    {
        // Get logged in user's recent bookings
        $bookings = Booking::where('user_id', auth()->id())
                   ->with('schedule.flight')
                   ->latest()
                   ->take(5)
                   ->get();

        return view('user.dashboard', compact('bookings'));
    }

    // Show flight search page
    public function search(Request $request)
    {
        // Get all cities for dropdown menus
        $cities = City::all();
        $schedules = [];

        // If user submitted search form
        if($request->has('source_city')) {

            // Find schedules matching the search
            $schedules = Schedule::with(['flight.source', 'flight.destination'])
                ->whereHas('flight', function($query) use ($request) {
                    $query->where('source_city', $request->source_city)
                          ->where('destination_city', $request->destination_city);
                })
                ->where('departure_time', '>=', now())
                ->get();
        }

        return view('user.search', compact('cities', 'schedules'));
    }

    // Show booking confirmation page
    public function book(Schedule $schedule)
    {
        return view('user.book', compact('schedule'));
    }

    // Save booking to database
    public function store(Request $request, Schedule $schedule)
    {
        // Generate a unique PNR code
        // SKY- followed by 8 random uppercase characters
        $pnr = 'SKY-' . strtoupper(Str::random(8));

        // Create the booking in database
        Booking::create([
            'user_id'      => auth()->id(),
            'schedule_id'  => $schedule->id,
            'pnr_code'     => $pnr,
            'status'       => 'booked',
            'booking_date' => now()->toDateString(),
        ]);

        // Redirect to my tickets page with success message
        return redirect()->route('user.tickets')
               ->with('success', 'Ticket booked successfully! Your PNR is: ' . $pnr);
    }

    // Show all tickets for logged in user
    public function tickets()
    {
        // Get all bookings for logged in user
        $bookings = Booking::where('user_id', auth()->id())
                   ->with('schedule.flight')
                   ->latest()
                   ->get();

        return view('user.tickets', compact('bookings'));
    }

    // Show single ticket / e-ticket
    public function show(Booking $booking)
    {
        // Make sure user can only see their own tickets
        if($booking->user_id != auth()->id()) {
            abort(403, 'Unauthorized');
        }

        return view('user.ticket', compact('booking'));
    }

    // Cancel a booking
    public function cancel(Booking $booking)
    {
        // Make sure user can only cancel their own tickets
        if($booking->user_id != auth()->id()) {
            abort(403, 'Unauthorized');
        }

        // Update status to cancelled
        $booking->update(['status' => 'cancelled']);

        return redirect()->route('user.tickets')
               ->with('success', 'Booking cancelled successfully!');
    }
}