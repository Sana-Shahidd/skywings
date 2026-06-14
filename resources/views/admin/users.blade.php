@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 style="color:#1a237e; font-weight:700;">All Users</h3>
        <p style="color:#999; font-size:0.85rem; margin:0;">
            Manage registered passengers
        </p>
    </div>
    <a href="/admin/dashboard" class="btn btn-outline-secondary btn-sm">
        ← Back to Dashboard
    </a>
</div>

@if(session('success'))
    <div class="alert alert-admin">{{ session('success') }}</div>
@endif

<div class="admin-card">
    <div class="card-header">👥 Registered Passengers</div>
    <div class="card-body p-0">
        <table class="table admin-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registered On</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $user->name }}</strong></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="/admin/users/{{ $user->id }}/edit"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <form action="/admin/users/{{ $user->id }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this user?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            No users registered yet!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection