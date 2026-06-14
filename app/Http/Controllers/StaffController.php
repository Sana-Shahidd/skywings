<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\CheckinLog;

class StaffController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Staff Controller
    |--------------------------------------------------------------------------
    | This controller handles everything for the Staff Module.
    | Staff can:
    | - View their dashboard
    | - Verify a ticket using PNR code
    | - Mark passenger as checked in
    | - View all checkin logs
    */

    // Show staff dashboard
    public function dashboard()
    {
        // Count today's checkins done by this staff member
        $todayCheckins = CheckinLog::where('staff_id', auth()->id())
                        ->whereDate('checkin_date', today())
                        ->count();

        // Count total checkins done by this staff member
        $totalCheckins = CheckinLog::where('staff_id', auth()->id())
                        ->count();

        return view('staff.dashboard', compact('todayCheckins', 'totalCheckins'));
    }

    // Show PNR verification page
    public function verify()
    {
        return view('staff.verify');
    }

    // Check PNR code and mark as checked in
    public function checkPNR(Request $request)
    {
        // Validate PNR code is entered
        $request->validate([
            'pnr_code' => 'required|string'
        ]);

        // Find booking with this PNR code
        $booking = Booking::where('pnr_code', $request->pnr_code)
                  ->with(['user', 'schedule.flight'])
                  ->first();

        // If no booking found with this PNR
        if(!$booking) {
            return back()->with('error', 'Invalid PNR code! No booking found.');
        }

        // If booking is already cancelled
        if($booking->status == 'cancelled') {
            return back()->with('error', 'This ticket has been cancelled!');
        }

        // If passenger is already checked in
        if($booking->status == 'checked-in') {
            return back()->with('error', 'Passenger already checked in!');
        }

        // Everything is valid - mark as checked in
        // Update booking status to checked-in
        $booking->update(['status' => 'checked-in']);

        // Create a checkin log record
        CheckinLog::create([
            'booking_id'   => $booking->id,
            'staff_id'     => auth()->id(),
            'checkin_date' => today(),
        ]);

        // Send booking details to view with success message
        return view('staff.verify', [
            'booking' => $booking,
            'success' => true
        ]);
    }

    // Show all checkin logs
    public function logs()
    {
        // Get all checkins done by this staff member
        $logs = CheckinLog::where('staff_id', auth()->id())
               ->with(['booking.user', 'booking.schedule.flight'])
               ->latest()
               ->get();

        return view('staff.logs', compact('logs'));
    }
}