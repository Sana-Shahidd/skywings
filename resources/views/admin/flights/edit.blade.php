@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 style="color:#1a237e; font-weight:700;">Edit Flight</h3>
        <p style="color:#999; font-size:0.85rem; margin:0;">
            Update flight route information
        </p>
    </div>
    <a href="/admin/flights" class="btn btn-outline-secondary btn-sm">
        ← Back to Flights
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="admin-card">
            <div class="card-header">✏ Edit Flight Details</div>
            <div class="card-body">
                <form action="/admin/flights/{{ $flight->id }}"
                      method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="admin-label">Flight Name</label>
                        <input type="text" name="flight_name"
                               class="form-control admin-input"
                               value="{{ old('flight_name', $flight->flight_name) }}">
                    </div>

                    <div class="mb-3">
                        <label class="admin-label">Flight Code</label>
                        <input type="text" name="flight_code"
                               class="form-control admin-input"
                               value="{{ old('flight_code', $flight->flight_code) }}">
                    </div>

                    <div class="mb-3">
                        <label class="admin-label">From City</label>
                        <select name="source_city"
                                class="form-control admin-input">
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}"
                                    {{ old('source_city', $flight->source_city)
                                    == $city->id ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="admin-label">To City</label>
                        <select name="destination_city"
                                class="form-control admin-input">
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}"
                                    {{ old('destination_city',
                                    $flight->destination_city)
                                    == $city->id ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-warning">
                        Update Flight
                    </button>
                    <a href="/admin/flights"
                       class="btn btn-outline-secondary ms-2">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection