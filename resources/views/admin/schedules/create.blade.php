@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="page-header" style="margin-bottom:0;">
        <h3>Add New Schedule</h3>
        <div class="gold-line-sm"></div>
        <p>Create a new flight schedule</p>
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
            <div class="card-header">Schedule Details</div>
            <div class="card-body">
                <form action="/admin/schedules" method="POST">
                    @csrf

                    <!-- Flight -->
                    <div class="mb-4">
                        <label class="admin-label">Select Flight</label>
                        <select name="flight_id"
                                class="admin-input
                                @error('flight_id') is-invalid @enderror">
                            <option value="">-- Select Flight --</option>
                            @foreach($flights as $flight)
                                <option value="{{ $flight->id }}"
                                    {{ old('flight_id') == $flight->id
                                    ? 'selected' : '' }}>
                                    {{ $flight->flight_code }} —
                                    {{ $flight->flight_name }}
                                    ({{ $flight->source->name }} →
                                    {{ $flight->destination->name }})
                                </option>
                            @endforeach
                        </select>
                        @error('flight_id')
                            <div style="color:#dc3545; font-size:0.78rem;
                                        margin-top:5px;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        <!-- Departure -->
                        <div class="col-md-6 mb-4">
                            <label class="admin-label">
                                Departure Date &amp; Time
                            </label>
                            <input type="datetime-local"
                                   name="departure_time"
                                   class="admin-input
                                   @error('departure_time') is-invalid @enderror"
                                   value="{{ old('departure_time') }}"
                                   style="color-scheme: dark;">
                            @error('departure_time')
                                <div style="color:#dc3545; font-size:0.78rem;
                                            margin-top:5px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Arrival -->
                        <div class="col-md-6 mb-4">
                            <label class="admin-label">
                                Arrival Date &amp; Time
                            </label>
                            <input type="datetime-local"
                                   name="arrival_time"
                                   class="admin-input
                                   @error('arrival_time') is-invalid @enderror"
                                   value="{{ old('arrival_time') }}"
                                   style="color-scheme: dark;">
                            @error('arrival_time')
                                <div style="color:#dc3545; font-size:0.78rem;
                                            margin-top:5px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Seats -->
                        <div class="col-md-6 mb-4">
                            <label class="admin-label">Total Seats</label>
                            <input type="number"
                                   name="total_seats"
                                   class="admin-input"
                                   placeholder="e.g. 150"
                                   min="1"
                                   value="{{ old('total_seats') }}">
                        </div>

                        <!-- Price -->
                        <div class="col-md-6 mb-4">
                            <label class="admin-label">
                                Ticket Price (Rs.)
                            </label>
                            <input type="number"
                                   name="price"
                                   class="admin-input"
                                   placeholder="e.g. 15000"
                                   min="0"
                                   value="{{ old('price') }}">
                        </div>
                    </div>

                    <button type="submit" class="btn-admin">
                        Save Schedule
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