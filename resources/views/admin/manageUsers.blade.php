@extends('mainLayout')

@section('title', 'Manage Users')

@section('page-content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col bg-primary text-white text-center py-2 rounded">
            <h2>User Management Dashboard</h2>
        </div>
    </div>
    <div class="row">
        @foreach($users as $user)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle me-2" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                        <div>
                            <h5 class="card-title mb-0">{{ $user->name }}</h5>
                            <small>{{ $user->userInfo ? $user->userInfo->user_firstname.' '.$user->userInfo->user_lastname : 'N/A' }}</small>
                        </div>
                        <span class="badge bg-info ms-auto">{{ $user->roles->pluck('name')->join(' | ') }}</span>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                        <p class="card-text"><strong>User ID:</strong> {{ $user->id }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.editUser', $user->id) }}" class="btn btn-outline-success" title="Edit User">
                                <i class="bi bi-pencil-square me-1"></i> Edit
                            </a>
                            <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" title="Delete User">
                                    <i class="bi bi-trash me-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-4">
        <div class="col text-center">
            <a href="{{ route('dash') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle me-1"></i> Back to Dashboard
            </a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
