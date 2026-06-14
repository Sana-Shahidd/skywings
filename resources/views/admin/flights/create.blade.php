@extends('layouts.app')

@section('content')
<!--
    Add New Flight Page
    This page shows a form to add a new flight.
    Admin fills in flight name, code, source and destination city.
    Cities are shown as dropdown menus.
-->

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Page Title -->
            <h2 class="mb-4">+ Add New Flight</h2>

            <!-- Add Flight Form -->
            <div class="card">
                <div class="card-header bg-dark text-white">
                    Flight Details
                </div>
                <div class="card-body">

                    <!-- Form sends data to FlightController store() method -->
                    <form action="{{ route('admin.flights.store') }}" method="POST">
                        @csrf

                        <!-- Flight Name Field -->
                        <div class="mb-3">
                            <label class="form-label">Flight Name</label>
                            <input
                                type="text"
                                name="flight_name"
                                class="form-control @error('flight_name') is-invalid @enderror"
                                placeholder="e.g. PIA Express"
                                value="{{ old('flight_name') }}"
                            >
                            @error('flight_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Flight Code Field -->
                        <div class="mb-3">
                            <label class="form-label">Flight Code</label>
                            <input
                                type="text"
                                name="flight_code"
                                class="form-control @error('flight_code') is-invalid @enderror"
                                placeholder="e.g. PK-301"
                                value="{{ old('flight_code') }}"
                            >
                            @error('flight_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Source City Dropdown -->
                        <div class="mb-3">
                            <label class="form-label">From City (Departure)</label>
                            <select name="source_city"
                                    class="form-control @error('source_city') is-invalid @enderror">
                                <option value="">-- Select Departure City --</option>
                                {{-- Loop through all cities and show as options --}}
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}"
                                        {{ old('source_city') == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('source_city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Destination City Dropdown -->
                        <div class="mb-3">
                            <label class="form-label">To City (Arrival)</label>
                            <select name="destination_city"
                                    class="form-control @error('destination_city') is-invalid @enderror">
                                <option value="">-- Select Arrival City --</option>
                                {{-- Loop through all cities and show as options --}}
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}"
                                        {{ old('destination_city') == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('destination_city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Save Button -->
                        <button type="submit" class="btn btn-primary">
                            Save Flight
                        </button>

                        <!-- Cancel Button -->
                        <a href="{{ route('admin.flights.index') }}"
                           class="btn btn-secondary">
                            Cancel
                        </a>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection