@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="page-header" style="margin-bottom:0;">
        <h3>Edit Staff</h3>
        <div class="gold-line-sm"></div>
        <p>Update staff member — {{ $user->staff_id }}</p>
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
            <div class="card-header">Edit Staff Details</div>
            <div class="card-body">
                <form action="/admin/staff/{{ $user->id }}"
                      method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="admin-label">Full Name</label>
                            <input type="text" name="name"
                                   class="admin-input"
                                   value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="admin-label">Staff ID</label>
                            <input type="text" name="staff_id"
                                   class="admin-input"
                                   value="{{ old('staff_id', $user->staff_id) }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="admin-label">Email Address</label>
                            <input type="email" name="email"
                                   class="admin-input"
                                   value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="admin-label">Phone Number</label>
                            <input type="text" name="phone"
                                   class="admin-input"
                                   value="{{ old('phone', $user->phone) }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="admin-label">Designation</label>
                            <select name="designation" class="admin-input">
                                <option value="Check-in Officer"
                                    {{ old('designation', $user->designation)
                                    == 'Check-in Officer' ? 'selected' : '' }}>
                                    Check-in Officer
                                </option>
                                <option value="Gate Agent"
                                    {{ old('designation', $user->designation)
                                    == 'Gate Agent' ? 'selected' : '' }}>
                                    Gate Agent
                                </option>
                                <option value="Ticket Verification Officer"
                                    {{ old('designation', $user->designation)
                                    == 'Ticket Verification Officer'
                                    ? 'selected' : '' }}>
                                    Ticket Verification Officer
                                </option>
                                <option value="Boarding Officer"
                                    {{ old('designation', $user->designation)
                                    == 'Boarding Officer' ? 'selected' : '' }}>
                                    Boarding Officer
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="admin-label">Account Status</label>
                            <select name="is_active" class="admin-input">
                                <option value="1"
                                    {{ old('is_active', $user->is_active)
                                    == 1 ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="0"
                                    {{ old('is_active', $user->is_active)
                                    == 0 ? 'selected' : '' }}>
                                    Suspended
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn-admin me-3">
                            Update Staff
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