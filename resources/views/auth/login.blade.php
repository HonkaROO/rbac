@extends('mainLayout')

@section('page-title', 'Account Login')

@section('auth-content')
<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white text-center">
                    <h3 class="card-title">User Login</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="name" value="{{ old('name') }}" required class="form-control" id="username">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" required class="form-control" id="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-primary me-2">Login</button>
                            <button type="reset" class="btn btn-danger">Clear</button>
                        </div>
                        <div class="text-center">
                            Not a user? <a href="{{ route('register') }}">Register Here</a>.
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
