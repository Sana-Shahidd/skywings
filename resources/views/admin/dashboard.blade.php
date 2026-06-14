@extends('layouts.admin')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <h3>Dashboard</h3>
    <div class="gold-line-sm"></div>
    <p>Complete system overview and monitoring</p>
</div>

<!-- Stats Row -->
<div class="row g-3 mb-4">

    <div class="col-6 col-md-4 col-lg-2">
        <div class="stat-card"
             style="background:#0d0d0d; border:1px solid #1a1a1a;">
            <p>Passengers</p>
            <h2>{{ $totalUsers }}</h2>
            <a href="/admin/users"
               style="color:#555; font-size:0.7rem;
                      letter-spacing:1px; text-decoration:none;">
                VIEW ALL →
            </a>
        </div>
    </div>

    <div class="col-6 col-md-4 col-lg-2">
        <div class="stat-card"
             style="background:#0d0d0d; border:1px solid #1a1a1a;">
            <p>Staff</p>
            <h2>{{ $totalStaff }}</h2>
            <a href="/admin/staff"
               style="color:#555; font-size:0.7rem;
                      letter-spacing:1px; text-decoration:none;">
                VIEW ALL →
            </a>
        </div>
    </div>

    <div class="col-6 col-md-4 col-lg-2">
        <div class="stat-card"
             style="background:#0d0d0d; border:1px solid #1a1a1a;">
            <p>Flights</p>
            <h2>{{ $totalFlights }}</h2>
            <a href="/admin/flights"
               style="color:#555; font-size:0.7rem;
                      letter-spacing:1px; text-decoration:none;">
                VIEW ALL →
            </a>
        </div>
    </div>

    <div class="col-6 col-md-4 col-lg-2">
        <div class="stat-card"
             style="background:#0d0d0d; border:1px solid #1a1a1a;">
            <p>Cities</p>
            <h2>{{ $totalCities }}</h2>
            <a href="/admin/cities"
               style="color:#555; font-size:0.7rem;
                      letter-spacing:1px; text-decoration:none;">
                VIEW ALL →
            </a>
        </div>
    </div>

    <div class="col-6 col-md-4 col-lg-2">
        <div class="stat-card"
             style="background:#0d0d0d; border:1px solid #1a1a1a;">
            <p>Total Bookings</p>
            <h2>{{ $totalBookings }}</h2>
            <a href="/admin/bookings"
               style="color:#555; font-size:0.7rem;
                      letter-spacing:1px; text-decoration:none;">
                VIEW ALL →
            </a>
        </div>
    </div>

    <div class="col-6 col-md-4 col-lg-2">
        <div class="stat-card"
             style="background:#0d0d0d; border:1px solid #1a1a1a;">
            <p>Active Bookings</p>
            <h2>{{ $activeBookings }}</h2>
            <a href="/admin/bookings"
               style="color:#555; font-size:0.7rem;
                      letter-spacing:1px; text-decoration:none;">
                VIEW ALL →
            </a>
        </div>
    </div>

</div>

<!-- Quick Actions -->
<div class="admin-card mb-4">
    <div class="card-header">Quick Actions</div>
    <div class="card-body">
        <a href="/admin/staff/create" class="btn-admin me-2 mb-2">
            + Add Staff
        </a>
        <a href="/admin/cities/create" class="btn-admin me-2 mb-2">
            + Add City
        </a>
        <a href="/admin/flights/create" class="btn-admin me-2 mb-2">
            + Add Flight
        </a>
        <a href="/admin/schedules/create" class="btn-admin me-2 mb-2">
            + Add Schedule
        </a>
        <a href="/admin/staff"
           class="btn-admin me-2 mb-2"
           style="background:transparent; color:var(--gold);
                  border:1px solid var(--gold);">
            Manage Staff
        </a>
        <a href="/admin/bookings"
           class="btn-admin me-2 mb-2"
           style="background:transparent; color:var(--gold);
                  border:1px solid var(--gold);">
            All Bookings
        </a>
    </div>
</div>

<!-- Recent Bookings -->
<div class="admin-card">
    <div class="card-header">Recent Bookings</div>
    <div class="card-body p-0">
        <table class="table admin-table mb-0">
            <thead>
                <tr>
                    <th>PNR Code</th>
                    <th>Passenger</th>
                    <th>Flight</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Departure</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $recentBookings = \App\Models\Booking::with([
                        'user', 'schedule.flight'
                    ])->latest()->take(8)->get();
                @endphp
                @forelse($recentBookings as $booking)
                    <tr>
                        <td>
                            <span style="color:var(--gold); font-weight:700;">
                                {{ $booking->pnr_code }}
                            </span>
                        </td>
                        <td>{{ $booking->user->name }}</td>
                        <td>
                            {{ $booking->schedule->flight->flight_code }}
                        </td>
                        <td>
                            {{ $booking->schedule->flight->source->name }}
                        </td>
                        <td>
                            {{ $booking->schedule->flight->destination->name }}
                        </td>
                        <td>{{ $booking->schedule->departure_time }}</td>
                        <td>
                            @if($booking->status == 'booked')
                                <span class="badge bg-success">Booked</span>
                            @elseif($booking->status == 'cancelled')
                                <span class="badge bg-danger">Cancelled</span>
                            @else
                                <span class="badge bg-primary">
                                    Checked In
                                </span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4"
                            style="color:#333;">
                            No bookings yet
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection