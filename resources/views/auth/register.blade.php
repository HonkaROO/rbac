@extends('mainLayout')

@section('page-title', 'Account Registration')

@section('auth-content')
<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white text-center">
                    <h3 class="card-title"><i class="bi bi-person-plus"></i> Register New User</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="firstname" class="form-label"><i class="bi bi-person"></i> First Name</label>
                            <input type="text" name="firstname" value="{{ old('firstname') }}" required class="form-control" id="firstname">
                            @error('firstname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label"><i class="bi bi-person"></i> Last Name</label>
                            <input type="text" name="lastname" value="{{ old('lastname') }}" required class="form-control" id="lastname">
                            @error('lastname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label"><i class="bi bi-person-badge"></i> Username</label>
                            <input type="text" name="name" value="{{ old('name') }}" required class="form-control" id="username">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label"><i class="bi bi-envelope"></i> Email</label>
                            <input type="email" name="email" class="form-control" id="email">
                            <div class="form-check mt-2">
                                <input type="checkbox" name="generate_email" id="generate_email" class="form-check-input">
                                <label for="generate_email" class="form-check-label"></i> Generate Email Address</label>
                            </div>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label"><i class="bi bi-lock"></i> Password</label>
                            <input type="password" name="password" required class="form-control" id="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label"><i class="bi bi-lock"></i> Confirm Password</label>
                            <input type="password" name="password_confirmation" required class="form-control" id="password_confirmation">
                        </div>
                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-person-plus"></i> Register</button>
                            <button type="reset" class="btn btn-danger"><i class="bi bi-x"></i> Clear</button>
                        </div>
                    </form>
                    <div class="text-center">
                        Already registered? <a href="{{ route('login') }}">Login Here</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
