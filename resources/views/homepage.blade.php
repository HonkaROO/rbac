@extends('mainLayout')

@section('page-title','Main Landing Page')

@section('page-content')
<div class="container-fluid py-5">
    <div class="text-center mb-5">
        <h1>Welcome to RBAC Implementation</h1>
        <p class="lead">Navigate through the various sections based on your roles and permissions.</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <a href="{{ route('acctg') }}"
                        @unless(Auth::user()->hasRole('admin') || Auth::user()->hasRole('bookeeper') || Auth::user()->hasRole('auditor') || Auth::user()->hasRole('audasst'))
                            class="link-dark text-decoration-none" style="pointer-events: none; cursor: not-allowed;"
                        @else
                            class="btn btn-primary"
                        @endunless
                    >
                        <i class="bi bi-calculator me-2"></i>Accounting
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <a href="{{ route('prod') }}"
                        @unless(Auth::user()->hasRole('admin') || Auth::user()->hasRole('assembler'))
                            class="link-dark text-decoration-none" style="pointer-events: none; cursor: not-allowed;"
                        @else
                            class="btn btn-primary"
                        @endunless
                    >
                        <i class="bi bi-gear me-2"></i>Production
                    </a>
                </div>
            </div>
        </div>
        @if(Auth::user()->hasRole('admin'))
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body text-center">
                        <a href="{{ route('dash') }}" class="btn btn-primary">
                            <i class="bi bi-speedometer2 me-2"></i>Dashboard
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
