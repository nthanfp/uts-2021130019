@extends('layouts.template')

@section('title', 'Edit Transaction')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card border-success mb-3">
                    <div class="card-header bg-success text-white">Edir Transaction</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('transaction.update', $transaction) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="amount">Jumlah (Rp)</label>
                                <input type="number" class="form-control" id="amount" name="amount"
                                    value="{{ $transaction->amount }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="type">Tipe</label>
                                <select class="form-control" id="type" name="type" required>
                                    <option value="income" {{ $transaction->type == 'income' ? 'selected' : '' }}>Income
                                    </option>
                                    <option value="expense" {{ $transaction->type == 'expense' ? 'selected' : '' }}>Expense
                                    </option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="category">Kategori</label>
                                <select class="form-control" id="category" name="category" required>
                                    <optgroup label="Income">
                                        <option value="wage" {{ $transaction->category == 'wage' ? 'selected' : '' }}>Wage
                                        </option>
                                        <option value="bonus" {{ $transaction->category == 'bonus' ? 'selected' : '' }}>
                                            Bonus</option>
                                        <option value="gift" {{ $transaction->category == 'gift' ? 'selected' : '' }}>Gift
                                        </option>
                                    </optgroup>
                                    <optgroup label="Expense">
                                        <option value="food & drinks"
                                            {{ $transaction->category == 'food & drinks' ? 'selected' : '' }}>Food & Drinks
                                        </option>
                                        <option value="shopping"
                                            {{ $transaction->category == 'shopping' ? 'selected' : '' }}>Shopping</option>
                                        <option value="charity" {{ $transaction->category == 'charity' ? 'selected' : '' }}>
                                            Charity</option>
                                        <option value="housing"
                                            {{ $transaction->category == 'housing' ? 'selected' : '' }}>Housing</option>
                                        <option value="insurance"
                                            {{ $transaction->category == 'insurance' ? 'selected' : '' }}>Insurance
                                        </option>
                                        <option value="taxes" {{ $transaction->category == 'taxes' ? 'selected' : '' }}>
                                            Taxes</option>
                                        <option value="transportation"
                                            {{ $transaction->category == 'transportation' ? 'selected' : '' }}>
                                            Transportation</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="notes">Catatan</label>
                                <textarea class="form-control" id="notes" name="notes">{{ $transaction->notes }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
