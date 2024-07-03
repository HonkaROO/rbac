@extends('mainLayout')

@section('page-content')
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h1 class="display-5">Ledger Entries</h1>
        <blockquote class="blockquote">
            <p class="mb-0">"Be present above all else." - Naval Ravikant</p>
        </blockquote>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Entry</th>
                                <th class="text-end">Entry Amount</th>
                                <th>Encoded By</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allBooks as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td>{{ $book->entry }}</td>
                                <td class="text-end">{{ number_format($book->amount, 2) }}</td>
                                <td>{{ $book->user_id }}</td>
                                <td>
                                    <a href="{{ route('ledger', $book->id) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="View Details">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $allBooks->links() }}
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('acctg') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-2"></i>Back to Accounting
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
