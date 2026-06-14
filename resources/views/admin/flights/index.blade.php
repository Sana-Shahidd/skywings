@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 style="color:#1a237e; font-weight:700;">Manage Flights</h3>
        <p style="color:#999; font-size:0.85rem; margin:0;">
            Add and manage flight routes
        </p>
    </div>
    <a href="/admin/flights/create" class="btn btn-admin">
        + Add New Flight
    </a>
</div>

@if(session('success'))
    <div class="alert alert-admin">{{ session('success') }}</div>
@endif

<div class="admin-card">
    <div class="card-header">✈ All Flights</div>
    <div class="card-body p-0">
        <table class="table admin-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Flight Name</th>
                    <th>Code</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($flights as $flight)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $flight->flight_name }}</strong></td>
                        <td>
                            <span class="badge"
                                  style="background:#1a237e;">
                                {{ $flight->flight_code }}
                            </span>
                        </td>
                        <td>{{ $flight->source->name }}</td>
                        <td>{{ $flight->destination->name }}</td>
                        <td>
                            <a href="/admin/flights/{{ $flight->id }}/edit"
                               class="btn btn-warning btn-sm">Edit</a>
                            <form action="/admin/flights/{{ $flight->id }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this flight?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            No flights found. Add your first flight!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<a href="/admin/dashboard" class="btn btn-outline-secondary">
    ← Back to Dashboard
</a>

@endsection