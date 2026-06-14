@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 style="color:#1a237e; font-weight:700;">Edit Booking</h3>
        <p style="color:#999; font-size:0.85rem; margin:0;">
            PNR: {{ $booking->pnr_code }}
        </p>
    </div>
    <a href="/admin/bookings" class="btn btn-outline-secondary btn-sm">
        ← Back to Bookings
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="admin-card">
            <div class="card-header">✏ Edit Booking Details</div>
            <div class="card-body">
                <form action="/admin/bookings/{{ $booking->id }}"
                      method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="admin-label">Passenger Name</label>
                        <input type="text" class="form-control admin-input"
                               value="{{ $booking->user->name }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="admin-label">PNR Code</label>
                        <input type="text" class="form-control admin-input"
                               value="{{ $booking->pnr_code }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="admin-label">Flight Schedule</label>
                        <select name="schedule_id"
                                class="form-control admin-input">
                            @foreach($schedules as $schedule)
                                <option value="{{ $schedule->id }}"
                                    {{ $booking->schedule_id == $schedule->id
                                    ? 'selected' : '' }}>
                                    {{ $schedule->flight->flight_code }} —
                                    {{ $schedule->flight->source->name }} →
                                    {{ $schedule->flight->destination->name }} —
                                    {{ $schedule->departure_time }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="admin-label">Booking Status</label>
                        <select name="status"
                                class="form-control admin-input">
                            <option value="booked"
                                {{ $booking->status == 'booked' ? 'selected' : '' }}>
                                Booked
                            </option>
                            <option value="cancelled"
                                {{ $booking->status == 'cancelled' ? 'selected' : '' }}>
                                Cancelled
                            </option>
                            <option value="checked-in"
                                {{ $booking->status == 'checked-in' ? 'selected' : '' }}>
                                Checked In
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-admin">
                        Update Booking
                    </button>
                    <a href="/admin/bookings"
                       class="btn btn-outline-secondary ms-2">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection