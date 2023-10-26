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
                                    <td>{{ $balance }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Amount Income</th>
                                    <th scope="row">:</th>
                                    <td>{{ $totalIncome }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Amount Expense</th>
                                    <th scope="row">:</th>
                                    <td>{{ $totalExpense }}</td>
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
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
                                        <th>Tipe</th>
                                        <th>Kategori</th>
                                        <th>Catatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->created_at }}</td>
                                            <td>{{ $transaction->amount }}</td>
                                            <td>{{ ucfirst($transaction->type) }}</td>
                                            <td>{{ ucfirst($transaction->category) }}</td>
                                            <td>{{ $transaction->notes }}</td>
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
