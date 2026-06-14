@extends('layouts.app')

@section('content')

<div data-aos="fade-up">

    <div class="mb-5">
        <p style="color: var(--gold); letter-spacing:3px;
                  text-transform:uppercase; font-size:0.8rem;">
            Find Your Flight
        </p>
        <h2 class="page-title">Search Flights</h2>
        <div class="gold-line"></div>
    </div>

    <!-- Search Form -->
    <div class="luxury-card mb-5">
        <div class="card-header">✈ Search Available Flights</div>
        <div class="card-body">
            <form action="/user/search" method="GET">
                <div class="row g-3 align-items-end">
                    <div class="col-md-5">
                        <label class="luxury-label">From City</label>
                        <select name="source_city"
                                class="form-control luxury-input" required>
                            <option value="">-- Select Departure City --</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}"
                                    {{ request('source_city') == $city->id
                                    ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label class="luxury-label">To City</label>
                        <select name="destination_city"
                                class="form-control luxury-input" required>
                            <option value="">-- Select Arrival City --</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}"
                                    {{ request('destination_city') == $city->id
                                    ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-gold w-100 py-2">
                            Search ✈
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Search Results -->
    @if(request('source_city'))
        <div class="luxury-card" data-aos="fade-up">
            <div class="card-header">Available Flights</div>
            <div class="card-body p-0">
                <table class="table luxury-table mb-0">
                    <thead>
                        <tr>
                            <th>Flight</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Departure</th>
                            <th>Arrival</th>
                            <th>Seats</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($schedules as $schedule)
                            <tr>
                                <td>
                                    <strong style="color:var(--gold);">
                                        {{ $schedule->flight->flight_code }}
                                    </strong>
                                    <br>
                                    <small style="color:#555;">
                                        {{ $schedule->flight->flight_name }}
                                    </small>
                                </td>
                                <td>
                                    {{ $schedule->flight->source->name }}
                                </td>
                                <td>
                                    {{ $schedule->flight->destination->name }}
                                </td>
                                <td>
                                    <!-- Simple date -->
                                    {{ \Carbon\Carbon::parse($schedule->departure_time)->format('d M Y') }}
                                    <br>
                                    <small style="color:#555;">
                                        {{ \Carbon\Carbon::parse($schedule->departure_time)->format('h:i A') }}
                                    </small>
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($schedule->arrival_time)->format('d M Y') }}
                                    <br>
                                    <small style="color:#555;">
                                        {{ \Carbon\Carbon::parse($schedule->arrival_time)->format('h:i A') }}
                                    </small>
                                </td>
                                <td>{{ $schedule->total_seats }}</td>
                                <td style="color:var(--gold);">
                                    <strong>
                                        Rs. {{ number_format($schedule->price) }}
                                    </strong>
                                </td>
                                <td>
                                    <a href="/user/book/{{ $schedule->id }}"
                                       class="btn btn-gold btn-sm">
                                        Book Now
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4"
                                    style="color:#444;">
                                    No flights found for this route.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endif

</div>

@endsection