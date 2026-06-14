@extends('layouts.app')

@section('content')

<div class="row justify-content-center" data-aos="fade-up">
    <div class="col-md-8">

        <div class="mb-4">
            <p style="color: var(--gold); letter-spacing:3px;
                      text-transform:uppercase; font-size:0.8rem;">
                Confirm Your Booking
            </p>
            <h2 class="page-title">Flight Details</h2>
            <div class="gold-line"></div>
        </div>

        <div class="luxury-card mb-4">
            <div class="card-header">✈ Flight Information</div>
            <div class="card-body">
                <table class="table luxury-table">
                    <tr>
                        <th style="color:var(--gold); width:35%;">
                            Flight
                        </th>
                        <td>
                            {{ $schedule->flight->flight_name }}
                            ({{ $schedule->flight->flight_code }})
                        </td>
                    </tr>
                    <tr>
                        <th style="color:var(--gold);">From</th>
                        <td>{{ $schedule->flight->source->name }}</td>
                    </tr>
                    <tr>
                        <th style="color:var(--gold);">To</th>
                        <td>{{ $schedule->flight->destination->name }}</td>
                    </tr>
                    <tr>
                        <th style="color:var(--gold);">Departure</th>
                        <td>
                            <!-- Simple readable date -->
                            {{ \Carbon\Carbon::parse($schedule->departure_time)->format('d M Y') }}
                            at
                            {{ \Carbon\Carbon::parse($schedule->departure_time)->format('h:i A') }}
                        </td>
                    </tr>
                    <tr>
                        <th style="color:var(--gold);">Arrival</th>
                        <td>
                            {{ \Carbon\Carbon::parse($schedule->arrival_time)->format('d M Y') }}
                            at
                            {{ \Carbon\Carbon::parse($schedule->arrival_time)->format('h:i A') }}
                        </td>
                    </tr>
                    <tr>
                        <th style="color:var(--gold);">Available Seats</th>
                        <td>{{ $schedule->total_seats }}</td>
                    </tr>
                    <tr>
                        <th style="color:var(--gold);">Price</th>
                        <td>
                            <strong style="color:var(--gold);
                                           font-size:1.3rem;">
                                Rs. {{ number_format($schedule->price) }}
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <th style="color:var(--gold);">Passenger</th>
                        <td>{{ auth()->user()->name }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <form action="/user/book/{{ $schedule->id }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-gold btn-lg px-5">
                ✅ Confirm Booking
            </button>
            <a href="/user/search"
               class="btn btn-outline-gold btn-lg px-5 ms-3">
                Cancel
            </a>
        </form>

    </div>
</div>

@endsection