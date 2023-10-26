<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions   = Transaction::latest('created_at')->paginate(10);
        $balance        = Transaction::sum('amount');
        $totalIncome    = Transaction::where('type', 'income')->sum('amount');
        $totalExpense   = Transaction::where('type', 'expense')->sum('amount');
        $countIncome    = Transaction::where('type', 'income')->count();
        $countExpense   = Transaction::where('type', 'expense')->count();

        return view('transaction.index', compact('transactions', 'balance', 'totalIncome', 'totalExpense', 'countIncome', 'countExpense'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
