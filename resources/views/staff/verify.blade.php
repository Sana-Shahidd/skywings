@extends('layouts.staff')

@section('content')

<div class="row mb-4">
    <div class="col-12">
        <h3 style="color:#00695c; font-weight:700;">
            Verify Ticket
        </h3>
        <p style="color:#999; font-size:0.85rem;">
            Enter passenger PNR code to verify and check in
        </p>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">

        <!-- PNR Form -->
        <div class="staff-card mb-4">
            <div class="card-header">🔍 Enter PNR Code</div>
            <div class="card-body">
                <form action="/staff/verify" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-8">
                            <input type="text"
                                   name="pnr_code"
                                   class="form-control pnr-input"
                                   placeholder="e.g. SKY-ABCD1234"
                                   value="{{ old('pnr_code') }}">
                        </div>
                        <div class="col-md-4">
                            <button type="submit"
                                    class="btn btn-staff w-100 py-3">
                                ✅ Verify
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Error Message -->
        @if(session('error'))
            <div class="alert alert-staff-error">
                ❌ {{ session('error') }}
            </div>
        @endif

        <!-- Success Result -->
        @if(isset($success) && $success)
            <div class="alert alert-staff-success mb-4">
                ✅ Passenger successfully checked in!
            </div>

            <div class="verified-card">
                <div class="verified-header">
                    <h4>✅ Ticket Verified!</h4>
                    <p style="margin:0; opacity:0.8;">
                        Passenger has been checked in
                    </p>
                </div>
                <div class="card-body p-4">
                    <table class="table staff-table">
                        <tr>
                            <th>PNR Code</th>
                            <td>
                                <strong style="color:#00695c; font-size:1.1rem;">
                                    {{ $booking->pnr_code }}
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <th>Passenger</th>
                            <td>{{ $booking->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Flight</th>
                            <td>
                                {{ $booking->schedule->flight->flight_name }}
                                ({{ $booking->schedule->flight->flight_code }})
                            </td>
                        </tr>
                        <tr>
                            <th>From</th>
                            <td>
                                {{ $booking->schedule->flight->source->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>To</th>
                            <td>
                                {{ $booking->schedule->flight->destination->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>Departure</th>
                            <td>{{ $booking->schedule->departure_time }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge bg-primary px-3 py-2">
                                    ✅ CHECKED IN
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        @endif

        <a href="/staff/dashboard" class="btn btn-outline-secondary mt-3">
            ← Back to Dashboard
        </a>

    </div>
</div>

@endsection