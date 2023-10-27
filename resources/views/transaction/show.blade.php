@extends('layouts.template')

@section('title', 'Detail Transaction')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card border-success mb-3">
                    <div class="card-header bg-success text-white">Detail Transaction</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $transaction->id }}</td>
                                </tr>
                                <tr>
                                    <th>Jumlah (Rp)</th>
                                    <td>{{ $transaction->amount }}</td>
                                </tr>
                                <tr>
                                    <th>Tipe</th>
                                    <td>{{ ucfirst($transaction->type) }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td>{{ ucfirst($transaction->category) }}</td>
                                </tr>
                                <tr>
                                    <th>Catatan</th>
                                    <td>{{ $transaction->notes }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>{{ $transaction->created_at }}</td>
                                </tr>
                            </table>
                        </div>
                        <a href="{{ route('transaction.index') }}" class="btn btn-success">Kembali</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
