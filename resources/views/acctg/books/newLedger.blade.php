@extends('mainLayout')

@section('page-content')
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h1 class="display-5">New Ledger Entry</h1>
        <blockquote class="blockquote">
            <p class="mb-0">"Do what you can, with what you have, where you are." - Theodore Roosevelt</p>
        </blockquote>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
            <a href="{{ route('ledgers') }}" class="btn btn-sm btn-success mt-2">
                <i class="bi bi-journal-check"></i> View All Ledgers
            </a>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-dark text-white">
                    <h5 class="card-title mb-0"><i class="bi bi-file-earmark-plus"></i> Add New Entry</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('saveledger') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="entrydetail" class="form-label">Entry Detail:</label>
                            <textarea name="entry" id="entrydetail" cols="30" rows="5" class="form-control" style="resize:none;" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="entryamount" class="form-label">Amount:</label>
                            <input type="text" class="form-control text-end" id="entryamount" name="amount" required>
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="bi bi-check-lg"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger">
                                <i class="bi bi-x-lg"></i> Clear
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('acctg') }}" class="btn btn-outline-dark">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
