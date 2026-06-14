@extends('layouts.app')

@section('content')

<div class="row justify-content-center" data-aos="fade-up">
    <div class="col-md-8">

        @if(session('success'))
            <div class="alert alert-luxury mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- E-Ticket -->
        <div style="border: 1px solid var(--gold);">

            <!-- Header -->
            <div style="background: linear-gradient(135deg, #0a0a0a, #1a1a1a);
                        border-bottom: 1px solid var(--gold);
                        padding: 35px;
                        text-align: center;">
                <p style="color:var(--gold); letter-spacing:5px;
                          text-transform:uppercase; font-size:0.7rem;
                          margin:0 0 10px;">
                    Electronic Ticket
                </p>
                <h2 style="font-family:'Playfair Display', serif;
                           color:#ffffff; margin:0; font-size:2rem;
                           letter-spacing:3px;">
                    ✈ SKYWINGS
                </h2>
                <p style="color:#444; margin:8px 0 0;
                          font-size:0.75rem; letter-spacing:2px;">
                    BOARDING PASS
                </p>
            </div>

            <!-- PNR Section -->
            <div style="background:#0d0d0d; padding:30px;
                        text-align:center;
                        border-bottom: 1px solid #1a1a1a;">
                <p style="color:#444; font-size:0.7rem;
                          letter-spacing:4px; text-transform:uppercase;
                          margin:0 0 10px;">
                    Booking Reference
                </p>
                <h1 style="color:var(--gold); font-size:2.8rem;
                           font-weight:700; letter-spacing:8px;
                           margin:0 0 15px; font-family:'Playfair Display',serif;">
                    {{ $booking->pnr_code }}
                </h1>
                @if($booking->status == 'booked')
                    <span class="badge bg-success px-4 py-2"
                          style="letter-spacing:2px; font-size:0.75rem;">
                        CONFIRMED
                    </span>
                @elseif($booking->status == 'cancelled')
                    <span class="badge bg-danger px-4 py-2"
                          style="letter-spacing:2px; font-size:0.75rem;">
                        CANCELLED
                    </span>
                @else
                    <span class="badge bg-primary px-4 py-2"
                          style="letter-spacing:2px; font-size:0.75rem;">
                        CHECKED IN
                    </span>
                @endif
            </div>

            <!-- Passenger Info -->
            <div style="background:#111; padding:25px 35px;
                        border-bottom: 1px solid #1a1a1a;">
                <div class="row">
                    <div class="col-md-6">
                        <p style="color:#444; font-size:0.68rem;
                                  letter-spacing:2px; text-transform:uppercase;
                                  margin:0;">
                            Passenger Name
                        </p>
                        <h5 style="color:#ffffff; margin:6px 0 0;
                                   font-size:1.1rem;">
                            {{ $booking->user->name }}
                        </h5>
                    </div>
                    <div class="col-md-6">
                        <p style="color:#444; font-size:0.68rem;
                                  letter-spacing:2px; text-transform:uppercase;
                                  margin:0;">
                            Booking Date
                        </p>
                        <h5 style="color:#ffffff; margin:6px 0 0;
                                   font-size:1.1rem;">
                            {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}
                        </h5>
                    </div>
                </div>
            </div>

            <!-- Route -->
            <div style="background:#0d0d0d; padding:35px;
                        border-bottom: 1px solid #1a1a1a;">
                <div class="row text-center align-items-center">
                    <div class="col-md-4">
                        <p style="color:#444; font-size:0.68rem;
                                  letter-spacing:2px; text-transform:uppercase;
                                  margin:0;">
                            Departure
                        </p>
                        <h3 style="color:var(--gold); margin:8px 0 5px;
                                   font-family:'Playfair Display',serif;">
                            {{ $booking->schedule->flight->source->name }}
                        </h3>
                        <p style="color:#555; font-size:0.82rem; margin:0;">
                            <!-- Simple date -->
                            {{ \Carbon\Carbon::parse($booking->schedule->departure_time)->format('d M Y') }}
                        </p>
                        <p style="color:var(--gold); font-size:1rem;
                                  font-weight:700; margin:3px 0 0;">
                            {{ \Carbon\Carbon::parse($booking->schedule->departure_time)->format('h:i A') }}
                        </p>
                    </div>
                    <div class="col-md-4">
                        <div style="font-size:2rem; color:#222;">✈</div>
                        <p style="color:#333; font-size:0.7rem;
                                  letter-spacing:1px; margin:5px 0 0;">
                            {{ $booking->schedule->flight->flight_code }}
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p style="color:#444; font-size:0.68rem;
                                  letter-spacing:2px; text-transform:uppercase;
                                  margin:0;">
                            Arrival
                        </p>
                        <h3 style="color:var(--gold); margin:8px 0 5px;
                                   font-family:'Playfair Display',serif;">
                            {{ $booking->schedule->flight->destination->name }}
                        </h3>
                        <p style="color:#555; font-size:0.82rem; margin:0;">
                            {{ \Carbon\Carbon::parse($booking->schedule->arrival_time)->format('d M Y') }}
                        </p>
                        <p style="color:var(--gold); font-size:1rem;
                                  font-weight:700; margin:3px 0 0;">
                            {{ \Carbon\Carbon::parse($booking->schedule->arrival_time)->format('h:i A') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Flight & Price Info -->
            <div style="background:#111; padding:25px 35px;
                        border-bottom: 1px solid #1a1a1a;">
                <div class="row text-center">
                    <div class="col-md-4">
                        <p style="color:#444; font-size:0.68rem;
                                  letter-spacing:2px; text-transform:uppercase;
                                  margin:0;">
                            Flight
                        </p>
                        <p style="color:#ccc; margin:6px 0 0; font-weight:600;">
                            {{ $booking->schedule->flight->flight_name }}
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p style="color:#444; font-size:0.68rem;
                                  letter-spacing:2px; text-transform:uppercase;
                                  margin:0;">
                            Ticket Price
                        </p>
                        <p style="color:var(--gold); margin:6px 0 0;
                                  font-size:1.2rem; font-weight:700;">
                            Rs. {{ number_format($booking->schedule->price) }}
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p style="color:#444; font-size:0.68rem;
                                  letter-spacing:2px; text-transform:uppercase;
                                  margin:0;">
                            Status
                        </p>
                        <p style="color:#ccc; margin:6px 0 0; font-weight:600;">
                            {{ strtoupper($booking->status) }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Important Note -->
            <div style="background:#0a0a0a; padding:20px 35px;
                        border-bottom: 1px solid #1a1a1a;
                        border-left: 3px solid var(--gold);">
                <p style="color:#555; font-size:0.82rem; margin:0;">
                    <span style="color:var(--gold); font-weight:700;">
                        Important:
                    </span>
                    Please show PNR code
                    <strong style="color:var(--gold);">
                        {{ $booking->pnr_code }}
                    </strong>
                    to airline staff at the airport for check-in.
                </p>
            </div>

            <!-- Footer -->
            <div style="background:#0d0d0d; padding:25px 35px;
                        text-align:center;">
                <a href="/user/tickets"
                   class="btn btn-outline-gold me-3">
                    ← My Tickets
                </a>
                @if($booking->status == 'booked')
                    <form action="/user/cancel/{{ $booking->id }}"
                          method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Cancel booking?')">
                            Cancel Booking
                        </button>
                    </form>
                @endif
            </div>

        </div>

    </div>
</div>

@endsection