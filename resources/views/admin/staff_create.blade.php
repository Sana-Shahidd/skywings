@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="page-header" style="margin-bottom:0;">
        <h3>Add New Staff</h3>
        <div class="gold-line-sm"></div>
        <p>Create a new airline staff account</p>
    </div>
    <a href="/admin/staff"
       style="color:var(--gold); text-decoration:none;
              font-size:0.8rem; letter-spacing:1px;">
        ← Back to Staff
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="admin-card">
            <div class="card-header">Staff Account Details</div>
            <div class="card-body">
                <form action="/admin/staff" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="admin-label">Full Name</label>
                            <input type="text" name="name"
                                   class="admin-input
                                   @error('name') is-invalid @enderror"
                                   placeholder="e.g. Ahmed Ali"
                                   value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback"
                                     style="color:#dc3545; font-size:0.78rem;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="admin-label">Staff ID</label>
                            <input type="text" name="staff_id"
                                   class="admin-input
                                   @error('staff_id') is-invalid @enderror"
                                   placeholder="e.g. SW-001"
                                   value="{{ old('staff_id') }}">
                            @error('staff_id')
                                <div class="invalid-feedback"
                                     style="color:#dc3545; font-size:0.78rem;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="admin-label">Email Address</label>
                            <input type="email" name="email"
                                   class="admin-input
                                   @error('email') is-invalid @enderror"
                                   placeholder="staff@skywings.com"
                                   value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback"
                                     style="color:#dc3545; font-size:0.78rem;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="admin-label">Phone Number</label>
                            <input type="text" name="phone"
                                   class="admin-input
                                   @error('phone') is-invalid @enderror"
                                   placeholder="e.g. 0300-1234567"
                                   value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback"
                                     style="color:#dc3545; font-size:0.78rem;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="admin-label">Designation</label>
                            <select name="designation"
                                    class="admin-input
                                    @error('designation') is-invalid @enderror">
                                <option value="">-- Select --</option>
                                <option value="Check-in Officer"
                                    {{ old('designation') == 'Check-in Officer'
                                    ? 'selected' : '' }}>
                                    Check-in Officer
                                </option>
                                <option value="Gate Agent"
                                    {{ old('designation') == 'Gate Agent'
                                    ? 'selected' : '' }}>
                                    Gate Agent
                                </option>
                                <option value="Ticket Verification Officer"
                                    {{ old('designation') ==
                                    'Ticket Verification Officer'
                                    ? 'selected' : '' }}>
                                    Ticket Verification Officer
                                </option>
                                <option value="Boarding Officer"
                                    {{ old('designation') == 'Boarding Officer'
                                    ? 'selected' : '' }}>
                                    Boarding Officer
                                </option>
                            </select>
                            @error('designation')
                                <div class="invalid-feedback"
                                     style="color:#dc3545; font-size:0.78rem;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="admin-label">Password</label>
                            <input type="password" name="password"
                                   class="admin-input
                                   @error('password') is-invalid @enderror"
                                   placeholder="Minimum 8 characters">
                            @error('password')
                                <div class="invalid-feedback"
                                     style="color:#dc3545; font-size:0.78rem;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn-admin me-3">
                            Create Staff Account
                        </button>
                        <a href="/admin/staff"
                           style="color:#444; text-decoration:none;
                                  font-size:0.8rem; letter-spacing:1px;">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection