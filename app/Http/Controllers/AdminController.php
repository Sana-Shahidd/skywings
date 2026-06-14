<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Flight;
use App\Models\City;
use App\Models\Schedule;
use App\Models\Booking;

class AdminController extends Controller
{
    // Admin Dashboard
    public function dashboard()
    {
        $totalUsers     = User::where('role', 'user')->count();
        $totalFlights   = Flight::count();
        $totalCities    = City::count();
        $totalBookings  = Booking::count();
        $totalStaff     = User::where('role', 'staff')->count();
        $activeBookings = Booking::where('status', 'booked')->count();

        return view('admin.dashboard', compact(
            'totalUsers', 'totalFlights', 'totalCities',
            'totalBookings', 'totalStaff', 'activeBookings'
        ));
    }

    // Show all passengers
    public function users()
    {
        $users = User::where('role', 'user')->latest()->get();
        return view('admin.users', compact('users'));
    }

    // Show edit user form
    public function editUser(User $user)
    {
        return view('admin.users_edit', compact('user'));
    }

    // Update user
    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);
        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('admin.users')
               ->with('success', 'User updated successfully!');
    }

    // Delete user
    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')
               ->with('success', 'User deleted successfully!');
    }

    // Show all staff
    public function staff()
    {
        $staffMembers = User::where('role', 'staff')->latest()->get();
        return view('admin.staff', compact('staffMembers'));
    }

    // Show create staff form
    public function createStaff()
    {
        return view('admin.staff_create');
    }

    // Save new staff
    public function storeStaff(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email',
            'password'    => 'required|string|min:8',
            'staff_id'    => 'required|string|unique:users,staff_id',
            'phone'       => 'required|string|max:20',
            'designation' => 'required|string|max:255',
        ]);

        User::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'role'        => 'staff',
            'staff_id'    => $request->staff_id,
            'phone'       => $request->phone,
            'designation' => $request->designation,
            'is_active'   => true,
        ]);

        return redirect()->route('admin.staff')
               ->with('success', 'Staff member created successfully!');
    }

    // Show edit staff form
    public function editStaff(User $user)
    {
        return view('admin.staff_edit', compact('user'));
    }

    // Update staff
    public function updateStaff(Request $request, User $user)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email,' . $user->id,
            'staff_id'    => 'required|string|unique:users,staff_id,' . $user->id,
            'phone'       => 'required|string|max:20',
            'designation' => 'required|string|max:255',
            'is_active'   => 'required|in:0,1',
        ]);

        $user->update([
            'name'        => $request->name,
            'email'       => $request->email,
            'staff_id'    => $request->staff_id,
            'phone'       => $request->phone,
            'designation' => $request->designation,
            'is_active'   => $request->is_active,
        ]);

        return redirect()->route('admin.staff')
               ->with('success', 'Staff updated successfully!');
    }

    // Delete staff
    public function deleteStaff(User $user)
    {
        $user->delete();
        return redirect()->route('admin.staff')
               ->with('success', 'Staff deleted successfully!');
    }

    // Show all bookings
    public function bookings()
    {
        $bookings = Booking::with(['user', 'schedule.flight'])
                   ->latest()->get();
        return view('admin.bookings', compact('bookings'));
    }

    // Show edit booking form
    public function editBooking(Booking $booking)
    {
        $schedules = Schedule::with('flight')->get();
        return view('admin.bookings_edit', compact('booking', 'schedules'));
    }

    // Update booking
    public function updateBooking(Request $request, Booking $booking)
    {
        $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'status'      => 'required|in:booked,cancelled,checked-in',
        ]);
        $booking->update([
            'schedule_id' => $request->schedule_id,
            'status'      => $request->status,
        ]);
        return redirect()->route('admin.bookings')
               ->with('success', 'Booking updated successfully!');
    }

    // Delete booking
    public function deleteBooking(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('admin.bookings')
               ->with('success', 'Booking deleted successfully!');
    }
}