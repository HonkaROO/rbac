@extends('mainLayout')

@section('page-content')
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h1 class="display-5">Accounting Dashboard</h1>
        <blockquote class="blockquote">
            <p class="mb-0">"Simplicity is the ultimate sophistication." - Leonardo da Vinci</p>
        </blockquote>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <div class="mb-4">
                        @can('create')
                            <a href="{{ url('acctg/new') }}" class="btn btn-primary btn-lg mb-3 me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Add a new ledger entry">
                                <i class="bi bi-plus-circle me-2"></i>Add New Ledger Entry
                            </a>
                        @endcan

                        @can('viewAll')
                            @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('bookeeper') || Auth::user()->hasRole('auditor') || Auth::user()->hasRole('audasst'))
                                <a href="{{ route('ledgers') }}" class="btn btn-secondary btn-lg mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="View all ledger entries">
                                    <i class="bi bi-journal-text me-2"></i>View All Ledgers
                                </a>
                            @else
                                <a href="{{ route('acctg') }}" class="btn btn-secondary btn-lg mb-3 disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="You don't have permission to view all ledgers" aria-disabled="true">
                                    <i class="bi bi-journal-text me-2"></i>View All Ledgers
                                </a>
                            @endif
                        @endcan
                    </div>

                    <div>
                        @include('slugs.homeLink')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
