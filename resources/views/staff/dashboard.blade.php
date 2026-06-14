@extends('layouts.staff')

@section('content')

<div class="row mb-4">
    <div class="col-12">
        <h3 style="color:#00695c; font-weight:700;">Staff Dashboard</h3>
        <p style="color:#999; font-size:0.85rem;">
            Welcome back, {{ auth()->user()->name }}!
        </p>
        @if(auth()->user()->staff_id)
            <p style="color:#f4a261; font-size:0.85rem; margin:0;">
                Staff ID: <strong>{{ auth()->user()->staff_id }}</strong> |
                {{ auth()->user()->designation }}
            </p>
        @endif
    </div>
</div>

<!-- Stats -->
<div class="row">
    <div class="col-md-6 mb-4">
        <div class="staff-stat">
            <p style="margin:0; opacity:0.8; font-size:0.8rem;
                      letter-spacing:1px;">
                TODAY'S CHECKINS
            </p>
            <h2>{{ $todayCheckins }}</h2>
            <p style="margin:0; opacity:0.7; font-size:0.8rem;">
                Passengers checked in today
            </p>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="staff-stat">
            <p style="margin:0; opacity:0.8; font-size:0.8rem;
                      letter-spacing:1px;">
                TOTAL CHECKINS
            </p>
            <h2>{{ $totalCheckins }}</h2>
            <p style="margin:0; opacity:0.7; font-size:0.8rem;">
                All time checkins by you
            </p>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="staff-card">
    <div class="card-header">⚡ Quick Actions</div>
    <div class="card-body">
        <a href="/staff/verify" class="btn btn-staff me-3">
            🔍 Verify Ticket
        </a>
        <a href="/staff/logs" class="btn btn-staff">
            📋 View Checkin Logs
        </a>
    </div>
</div>

@endsection