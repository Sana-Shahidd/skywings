@extends('layouts.app')

@section('content')

<div data-aos="fade-up">

    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <p style="color: var(--gold); letter-spacing:3px;
                      text-transform:uppercase; font-size:0.8rem;">
                My Bookings
            </p>
            <h2 class="page-title">My Tickets</h2>
            <div class="gold-line"></div>
        </div>
        <a href="/user/search" class="btn btn-gold">
            + Book New Flight
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-luxury mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="luxury-card">
        <div class="card-header">🎫 All My Bookings</div>
        <div class="card-body p-0">
            <table class="table luxury-table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>PNR Code</th>
                        <th>Flight</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Departure</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong style="color:var(--gold);">
                                    {{ $booking->pnr_code }}
                                </strong>
                            </td>
                            <td>
                                {{ $booking->schedule->flight->flight_code }}
                            </td>
                            <td>
                                {{ $booking->schedule->flight->source->name }}
                            </td>
                            <td>
                                {{ $booking->schedule->flight
                                ->destination->name }}
                            </td>
                            <td>
                                <!-- Simple date format -->
                                {{ \Carbon\Carbon::parse($booking->schedule->departure_time)->format('d M Y') }}
                                <br>
                                <small style="color:#555;">
                                    {{ \Carbon\Carbon::parse($booking->schedule->departure_time)->format('h:i A') }}
                                </small>
                            </td>
                            <td style="color:var(--gold);">
                                Rs. {{ number_format($booking->schedule->price) }}
                            </td>
                            <td>
                                @if($booking->status == 'booked')
                                    <span class="badge badge-booked">
                                        Booked
                                    </span>
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
                                @if($booking->status == 'booked')
                                    <form action="/user/cancel/{{ $booking->id }}"
                                          method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm(
                                                'Cancel this booking?')">
                                            Cancel
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-4"
                                style="color:#444;">
                                No tickets yet.
                                <a href="/user/search"
                                   style="color:var(--gold);">
                                    Book your first flight!
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