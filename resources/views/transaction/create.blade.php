@extends('layouts.template')

@section('title', 'Add Transaction')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card border-success mb-3">
                    <div class="card-header bg-success text-white">Add New Transactions</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('transaction.store') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="col-auto">
                                    <label for="amount">Amount</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Rp</div>
                                        <input type="text" class="form-control" id="amount" name="amount"
                                            placeholder="Amount" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="type">Type</label>
                                <select class="form-control" id="type" name="type" required>
                                    <option value="income">Income</option>
                                    <option value="expense">Expense</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category" required>
                                    <optgroup label="Income">
                                        <option value="wage">Wage</option>
                                        <option value="bonus">Bonus</option>
                                        <option value="gift">Gift</option>
                                    </optgroup>
                                    <optgroup label="Expense">
                                        <option value="food & drinks">Food & Drinks</option>
                                        <option value="shopping">Shopping</option>
                                        <option value="charity">Charity</option>
                                        <option value="housing">Housing</option>
                                        <option value="insurance">Insurance</option>
                                        <option value="taxes">Taxes</option>
                                        <option value="transportation">Transportation</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="notes">Catatan</label>
                                <textarea class="form-control" id="notes" name="notes"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
