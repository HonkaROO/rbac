@extends('mainLayout')

@section('page-content')
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h1 class="display-5">Production Dashboard</h1>
        <blockquote class="blockquote">
            <p class="mb-0">"You must be the change you wish to see in the world." - Mahatma Gandhi</p>
        </blockquote>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title">Manage Production Tasks</h5>
                    <p class="card-text">View and manage production tasks as an Assembler.</p>
                    <a href="{{ route('admin.editUser', $user->id) }}" class="btn btn-outline-success" title="Edit User">
                    @include('slugs.homelink')
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title">Home</h5>
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
