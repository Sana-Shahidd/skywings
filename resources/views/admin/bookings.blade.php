@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="page-header" style="margin-bottom:0;">
        <h3>All Bookings</h3>
        <div class="gold-line-sm"></div>
        <p>Manage all passenger bookings</p>
    </div>
    <a href="/admin/dashboard"
       style="color:var(--gold); text-decoration:none;
              font-size:0.8rem; letter-spacing:1px;">
        ← Back to Dashboard
    </a>
</div>

@if(session('success'))
    <div class="alert-admin mb-4">{{ session('success') }}</div>
@endif

<div class="admin-card">
    <div class="card-header">All Booking Records</div>
    <div class="card-body p-0">
        <table class="table admin-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>PNR Code</th>
                    <th>Passenger</th>
                    <th>Flight</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Departure</th>
                    <th>Booked On</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <span style="color:var(--gold);
                                         font-weight:700;
                                         letter-spacing:1px;">
                                {{ $booking->pnr_code }}
                            </span>
                        </td>
                        <td style="color:#ccc;">
                            {{ $booking->user->name }}
                        </td>
                        <td>
                            {{ $booking->schedule->flight->flight_code }}
                        </td>
                        <td>
                            {{ $booking->schedule->flight->source->name }}
                        </td>
                        <td>
                            {{ $booking->schedule->flight->destination->name }}
                        </td>
                        <td>
                            <!-- Simple readable date format -->
                            {{ \Carbon\Carbon::parse($booking->schedule->departure_time)->format('d M Y') }}
                            <br>
                            <small style="color:#555;">
                                {{ \Carbon\Carbon::parse($booking->schedule->departure_time)->format('h:i A') }}
                            </small>
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}
                        </td>
                        <td>
                            @if($booking->status == 'booked')
                                <span class="badge bg-success">Booked</span>
                            @elseif($booking->status == 'cancelled')
                                <span class="badge bg-danger">Cancelled</span>
                            @else
                                <span class="badge bg-primary">Checked In</span>
                            @endif
                        </td>
                        <td>
                            <a href="/admin/bookings/{{ $booking->id }}/edit"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <form action="/admin/bookings/{{ $booking->id }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm(
                                        'Delete this booking?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center py-5"
                            style="color:#333;">
                            No bookings found yet!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection