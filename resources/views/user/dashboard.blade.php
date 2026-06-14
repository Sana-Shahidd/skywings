@extends('layouts.app')

@section('content')
<!--
    User Dashboard - Black & Gold Luxury Theme
-->

<div data-aos="fade-up">

    <!-- Welcome Section -->
    <div class="mb-5">
        <p style="color: var(--gold); letter-spacing:3px;
                  text-transform:uppercase; font-size:0.8rem;">
            Welcome Back
        </p>
        <h2 class="page-title">{{ auth()->user()->name }}</h2>
        <div class="gold-line"></div>
    </div>

    <!-- Quick Actions -->
    <div class="row mb-5">
        <div class="col-md-6 mb-3">
            <a href="/user/search"
               style="text-decoration:none;">
                <div class="luxury-card p-4 text-center">
                    <div style="font-size:2.5rem; margin-bottom:15px;">🔍</div>
                    <h5 style="color: var(--gold); letter-spacing:2px;
                               text-transform:uppercase; font-size:0.9rem;">
                        Search Flights
                    </h5>
                    <p style="color:#666; font-size:0.85rem; margin:0;">
                        Find and book available flights
                    </p>
                </div>
            </a>
        </div>
        <div class="col-md-6 mb-3">
            <a href="/user/tickets" style="text-decoration:none;">
                <div class="luxury-card p-4 text-center">
                    <div style="font-size:2.5rem; margin-bottom:15px;">🎫</div>
                    <h5 style="color: var(--gold); letter-spacing:2px;
                               text-transform:uppercase; font-size:0.9rem;">
                        My Tickets
                    </h5>
                    <p style="color:#666; font-size:0.85rem; margin:0;">
                        View all your bookings
                    </p>
                </div>
            </a>
        </div>
    </div>

    <!-- Recent Bookings -->
    <div class="luxury-card">
        <div class="card-header">
            🎫 Recent Bookings
        </div>
        <div class="card-body p-0">
            <table class="table luxury-table mb-0">
                <thead>
                    <tr>
                        <th>PNR Code</th>
                        <th>Flight</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Departure</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td>
                                <strong style="color:var(--gold);">
                                    {{ $booking->pnr_code }}
                                </strong>
                            </td>
                            <td>{{ $booking->schedule->flight->flight_code }}</td>
                            <td>{{ $booking->schedule->flight->source->name }}</td>
                            <td>
                                {{ $booking->schedule->flight->destination->name }}
                            </td>
                            <td>{{ $booking->schedule->departure_time }}</td>
                            <td>
                                @if($booking->status == 'booked')
                                    <span class="badge badge-booked">Booked</span>
                                @elseif($booking->status == 'cancelled')
                                    <span class="badge badge-cancelled">
                                        Cancelled
                                    </span>
                                @else
                                    <span class="badge badge-checkedin">
                                        Checked In
                                    </span>
                                @endif
                            </td>
                            <td>
                                <a href="/user/ticket/{{ $booking->id }}"
                                   class="btn btn-outline-gold btn-sm">
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4"
                                style="color:#666;">
                                No bookings yet.
                                <a href="/user/search"
                                   style="color:var(--gold);">
                                    Search flights now!
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection