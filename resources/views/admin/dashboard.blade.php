@extends('mainLayout')

@section('page-content')
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h1 class="display-5">Admin Dashboard</h1>
        <blockquote class="blockquote">
            <p class="mb-0">"People find pleasure in different ways. I find it in keeping my mind clear." - Marcus Aurelius</p>
        </blockquote>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title"><h3>User Management Dashboard</h5>
                    <p class="card-text">Manage user role and profile as Admin</p>
                    <a href="{{ route('usertool') }}" class="btn btn-primary">
                        <i class="bi bi-person-badge me-2"></i>Manage User Roles and Permissions
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title"><h3>Return to Main Homepage</h5>
                    <p class="card-text">Return to the main landing page.</p>
                    <a href="{{ route('home') }}" class="btn btn-secondary">
                        <i class="bi bi-house-door me-2"></i>Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
