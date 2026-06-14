@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="page-header" style="margin-bottom:0;">
        <h3>Manage Schedules</h3>
        <div class="gold-line-sm"></div>
        <p>Add and manage flight schedules</p>
    </div>
    <a href="/admin/schedules/create" class="btn-admin">
        + Add Schedule
    </a>
</div>

@if(session('success'))
    <div class="alert-admin mb-4">{{ session('success') }}</div>
@endif

<div class="admin-card">
    <div class="card-header">All Schedules</div>
    <div class="card-body p-0">
        <table class="table admin-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Flight</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Departure</th>
                    <th>Arrival</th>
                    <th>Seats</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($schedules as $schedule)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td style="color:#ccc;">
                            <strong>
                                {{ $schedule->flight->flight_name }}
                            </strong>
                            <br>
                            <small style="color:var(--gold);">
                                {{ $schedule->flight->flight_code }}
                            </small>
                        </td>
                        <td>{{ $schedule->flight->source->name }}</td>
                        <td>{{ $schedule->flight->destination->name }}</td>
                        <td>
                            <!-- Simple date format -->
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
                            Rs. {{ number_format($schedule->price) }}
                        </td>
                        <td>
                            <a href="/admin/schedules/{{ $schedule->id }}/edit"
                               class="btn btn-warning btn-sm">Edit</a>
                            <form action="/admin/schedules/{{ $schedule->id }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center py-5"
                            style="color:#333;">
                            No schedules found!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<a href="/admin/dashboard"
   style="color:var(--gold); text-decoration:none;
          font-size:0.8rem; letter-spacing:1px;">
    ← Back to Dashboard
</a>

@endsection