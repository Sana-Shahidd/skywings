@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="page-header" style="margin-bottom:0;">
        <h3>Edit Schedule</h3>
        <div class="gold-line-sm"></div>
        <p>Update flight schedule details</p>
    </div>
    <a href="/admin/schedules"
       style="color:var(--gold); text-decoration:none;
              font-size:0.8rem; letter-spacing:1px;">
        ← Back to Schedules
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="admin-card">
            <div class="card-header">Edit Schedule Details</div>
            <div class="card-body">
                <form action="/admin/schedules/{{ $schedule->id }}"
                      method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Flight -->
                    <div class="mb-4">
                        <label class="admin-label">Select Flight</label>
                        <select name="flight_id" class="admin-input">
                            @foreach($flights as $flight)
                                <option value="{{ $flight->id }}"
                                    {{ old('flight_id', $schedule->flight_id)
                                    == $flight->id ? 'selected' : '' }}>
                                    {{ $flight->flight_code }} —
                                    {{ $flight->flight_name }}
                                    ({{ $flight->source->name }} →
                                    {{ $flight->destination->name }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <!-- Departure -->
                        <div class="col-md-6 mb-4">
                            <label class="admin-label">
                                Departure Date &amp; Time
                            </label>
                            <input type="datetime-local"
                                   name="departure_time"
                                   class="admin-input"
                                   style="color-scheme: dark;"
                                   value="{{ old('departure_time',
                                   \Carbon\Carbon::parse($schedule->departure_time)
                                   ->format('Y-m-d\TH:i')) }}">
                        </div>

                        <!-- Arrival -->
                        <div class="col-md-6 mb-4">
                            <label class="admin-label">
                                Arrival Date &amp; Time
                            </label>
                            <input type="datetime-local"
                                   name="arrival_time"
                                   class="admin-input"
                                   style="color-scheme: dark;"
                                   value="{{ old('arrival_time',
                                   \Carbon\Carbon::parse($schedule->arrival_time)
                                   ->format('Y-m-d\TH:i')) }}">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Seats -->
                        <div class="col-md-6 mb-4">
                            <label class="admin-label">Total Seats</label>
                            <input type="number"
                                   name="total_seats"
                                   class="admin-input"
                                   value="{{ old('total_seats',
                                   $schedule->total_seats) }}">
                        </div>

                        <!-- Price -->
                        <div class="col-md-6 mb-4">
                            <label class="admin-label">
                                Ticket Price (Rs.)
                            </label>
                            <input type="number"
                                   name="price"
                                   class="admin-input"
                                   value="{{ old('price', $schedule->price) }}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-warning px-4">
                        Update Schedule
                    </button>
                    <a href="/admin/schedules"
                       style="color:#444; text-decoration:none;
                              font-size:0.8rem; letter-spacing:1px;
                              margin-left:20px;">
                        Cancel
                    </a>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection