@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 style="color:#1a237e; font-weight:700;">Edit User</h3>
        <p style="color:#999; font-size:0.85rem; margin:0;">
            Update passenger information
        </p>
    </div>
    <a href="/admin/users" class="btn btn-outline-secondary btn-sm">
        ← Back to Users
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="admin-card">
            <div class="card-header">✏ Edit User Details</div>
            <div class="card-body">
                <form action="/admin/users/{{ $user->id }}"
                      method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="admin-label">Full Name</label>
                        <input type="text" name="name"
                               class="form-control admin-input
                               @error('name') is-invalid @enderror"
                               value="{{ old('name', $user->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="admin-label">Email Address</label>
                        <input type="email" name="email"
                               class="form-control admin-input
                               @error('email') is-invalid @enderror"
                               value="{{ old('email', $user->email) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-admin">
                        Update User
                    </button>
                    <a href="/admin/users"
                       class="btn btn-outline-secondary ms-2">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection