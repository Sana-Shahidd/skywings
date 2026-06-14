@extends('layouts.app')

@section('content')
<!--
    Cities Index Page
    This page shows all cities in the system.
    Admin can add, edit and delete cities from here.
-->

<div class="container">

    <!-- Page Title and Add Button -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>✈ Manage Cities</h2>
        <a href="{{ route('admin.cities.create') }}" class="btn btn-primary">
            + Add New City
        </a>
    </div>

    <!-- Success Message -->
    <!-- This shows when a city is added, edited or deleted -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Cities Table -->
    <div class="card">
        <div class="card-header bg-dark text-white">
            All Cities
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>City Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Loop through all cities and show each one --}}
                    @forelse($cities as $city)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $city->name }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('admin.cities.edit', $city->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('admin.cities.destroy', $city->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    {{-- Show this message if no cities exist yet --}}
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">
                                No cities found. Add your first city!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Back to Dashboard -->
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">
        ← Back to Dashboard
    </a>

</div>
@endsection