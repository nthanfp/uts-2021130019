@extends('layouts.template')

@section('title', 'Transaction')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="card border-success mb-3">
                    <div class="card-header bg-success text-white">Finance Information</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <tr>
                                    <th scope="row">Saldo</th>
                                    <th scope="row">:</th>
                                    <td>@currency($totalIncome - $totalExpense)</td>
                                </tr>
                                <tr>
                                    <th scope="row">Amount Income</th>
                                    <th scope="row">:</th>
                                    <td>@currency($totalIncome)</td>
                                </tr>
                                <tr>
                                    <th scope="row">Amount Expense</th>
                                    <th scope="row">:</th>
                                    <td>@currency($totalExpense)</td>
                                </tr>
                                <tr>
                                    <th scope="row">Income Transaction</th>
                                    <th scope="row">:</th>
                                    <td>{{ $countIncome }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Expense Transaction</th>
                                    <th scope="row">:</th>
                                    <td>{{ $countExpense }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card border-success mb-3">
                    <div class="card-header bg-success text-white">Transactions List</div>
                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="my-2">
                            <a href="{{ route('transaction.create') }}"><button class="btn btn-success">Add New
                                    Transaction</button></a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Type</th>
                                        <th>Category</th>
                                        <th>Notes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->created_at }}</td>
                                            <td>@currency($transaction->amount)</td>
                                            <td>{{ ucfirst($transaction->type) }}</td>
                                            <td>{{ ucwords($transaction->category) }}</td>
                                            <td>{{ $transaction->notes }}</td>
                                            <td>
                                                <a href="{{ route('transaction.show', $transaction) }}"
                                                    class="btn btn-info">
                                                    View
                                                </a>
                                                <a href="{{ route('transaction.edit', $transaction) }}"
                                                    class="btn btn-primary">
                                                    Edit
                                                </a>
                                                <form action="{{ route('transaction.destroy', $transaction) }}"
                                                    class="d-inline" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this transaction?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            {!! $transactions->links() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
