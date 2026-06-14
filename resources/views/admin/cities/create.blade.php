@extends('layouts.app')

@section('content')
<!--
    Add New City Page
    This page shows a form to add a new city.
    Admin fills in the city name and clicks Save.
-->

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <!-- Page Title -->
            <h2 class="mb-4">+ Add New City</h2>

            <!-- Add City Form -->
            <div class="card">
                <div class="card-header bg-dark text-white">
                    City Details
                </div>
                <div class="card-body">

                    <!-- Form sends data to CityController store() method -->
                    <form action="{{ route('admin.cities.store') }}" method="POST">
                        @csrf

                        <!-- City Name Field -->
                        <div class="mb-3">
                            <label class="form-label">City Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="e.g. Karachi"
                                value="{{ old('name') }}"
                            >
                            <!-- Show error if city name is empty -->
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Save Button -->
                        <button type="submit" class="btn btn-primary">
                            Save City
                        </button>

                        <!-- Cancel Button -->
                        <a href="{{ route('admin.cities.index') }}"
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