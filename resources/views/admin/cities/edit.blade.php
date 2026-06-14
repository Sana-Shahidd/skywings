@extends('layouts.app')

@section('content')
<!--
    Edit City Page
    This page shows a form to edit an existing city.
    The form is pre-filled with the current city name.
    Admin changes the name and clicks Update.
-->

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <!-- Page Title -->
            <h2 class="mb-4">✏ Edit City</h2>

            <!-- Edit City Form -->
            <div class="card">
                <div class="card-header bg-dark text-white">
                    Edit City Details
                </div>
                <div class="card-body">

                    <!-- Form sends data to CityController update() method -->
                    <form action="{{ route('admin.cities.update', $city->id) }}"
                          method="POST">
                        @csrf
                        @method('PUT')

                        <!-- City Name Field -->
                        <!-- value is pre-filled with current city name -->
                        <div class="mb-3">
                            <label class="form-label">City Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $city->name) }}"
                            >
                            <!-- Show error if city name is empty -->
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Update Button -->
                        <button type="submit" class="btn btn-warning">
                            Update City
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