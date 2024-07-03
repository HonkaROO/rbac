@extends('mainLayout')

@section('page-content')
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h1 class="display-5">Ledger Entry Details</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <h5 class="card-title">Entry Number: {{ $ledger->id }}</h5>
                    </div>
                    <div class="mb-3">
                        <label for="entryDetails" class="form-label">Entry Details:</label>
                        <textarea id="entryDetails" class="form-control" rows="5" readonly>{{ $ledger->entry }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="entryAmount" class="form-label">Amount:</label>
                        <p id="entryAmount" class="form-control-plaintext">PHP <span class="fw-bold">{{ number_format($ledger->amount, 2) }}</span></p>
                    </div>
                    <div class="mb-3">
                        <label for="encodedBy" class="form-label">Encoded by:</label>
                        <p id="encodedBy" class="form-control-plaintext">{{ $encoderName->user_firstname }} {{ $encoderName->user_lastname }}</p>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('ledgers') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Back to Ledgers
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
