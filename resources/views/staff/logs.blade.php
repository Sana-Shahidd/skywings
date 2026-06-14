@extends('layouts.staff')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 style="color:#00695c; font-weight:700;">Checkin Logs</h3>
        <p style="color:#999; font-size:0.85rem; margin:0;">
            All passengers checked in by you
        </p>
    </div>
    <a href="/staff/dashboard" class="btn btn-outline-secondary btn-sm">
        ← Back to Dashboard
    </a>
</div>

<div class="staff-card">
    <div class="card-header">📋 Checkin Records</div>
    <div class="card-body p-0">
        <table class="table staff-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>PNR Code</th>
                    <th>Passenger</th>
                    <th>Flight</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Checkin Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $log)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <strong style="color:#00695c;">
                                {{ $log->booking->pnr_code }}
                            </strong>
                        </td>
                        <td>{{ $log->booking->user->name }}</td>
                        <td>
                            {{ $log->booking->schedule->flight->flight_code }}
                        </td>
                        <td>
                            {{ $log->booking->schedule->flight->source->name }}
                        </td>
                        <td>
                            {{ $log->booking->schedule->flight
                            ->destination->name }}
                        </td>
                        <td>
                            <!-- Simple date format -->
                            {{ \Carbon\Carbon::parse($log->checkin_date)->format('d M Y') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            No checkin records yet!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection