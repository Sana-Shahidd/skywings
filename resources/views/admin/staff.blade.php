@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="page-header" style="margin-bottom:0;">
        <h3>Staff Management</h3>
        <div class="gold-line-sm"></div>
        <p>Create and manage airline staff accounts</p>
    </div>
    <a href="/admin/staff/create" class="btn-admin">+ Add Staff</a>
</div>

@if(session('success'))
    <div class="alert-admin mb-4">{{ session('success') }}</div>
@endif

<div class="admin-card">
    <div class="card-header">All Staff Members</div>
    <div class="card-body p-0">
        <table class="table admin-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Staff ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Designation</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($staffMembers as $staff)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <span style="color:var(--gold); font-weight:700;
                                         letter-spacing:1px;">
                                {{ $staff->staff_id }}
                            </span>
                        </td>
                        <td style="color:#ccc;">{{ $staff->name }}</td>
                        <td>{{ $staff->email }}</td>
                        <td>{{ $staff->phone }}</td>
                        <td>{{ $staff->designation }}</td>
                        <td>
                            @if($staff->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Suspended</span>
                            @endif
                        </td>
                        <td>
                            <a href="/admin/staff/{{ $staff->id }}/edit"
                               class="btn btn-warning btn-sm">Edit</a>
                            <form action="/admin/staff/{{ $staff->id }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm(
                                        'Delete this staff member?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5"
                            style="color:#333;">
                            No staff members found. Add your first staff!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection