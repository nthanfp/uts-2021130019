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
        $totalIncome    = Transaction::where('type', 'income')->sum('amount');
        $totalExpense   = Transaction::where('type', 'expense')->sum('amount');
        $countIncome    = Transaction::where('type', 'income')->count();
        $countExpense   = Transaction::where('type', 'expense')->count();

        return view('transaction.index', compact('transactions', 'totalIncome', 'totalExpense', 'countIncome', 'countExpense'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $totalIncome    = Transaction::where('type', 'income')->sum('amount');
        $totalExpense   = Transaction::where('type', 'expense')->sum('amount');
        $countIncome    = Transaction::where('type', 'income')->count();
        $countExpense   = Transaction::where('type', 'expense')->count();

        return view('transaction.create', compact('totalIncome', 'totalExpense', 'countIncome', 'countExpense'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'category' => 'required|in:wage,bonus,gift,food & drinks,shopping,charity,housing,insurance,taxes,transportation',
            'notes' => 'nullable|string',
        ]);

        Transaction::create([
            'amount' => $request->amount,
            'type' => $request->type,
            'category' => $request->category,
            'notes' => $request->notes,
        ]);

        return redirect()->route('transaction.index')->with('success', 'Transaction added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('transaction.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'category' => 'required|in:wage,bonus,gift,food & drinks,shopping,charity,housing,insurance,taxes,transportation',
            'notes' => 'nullable|string',
        ]);

        $transaction->update([
            'amount' => $request->amount,
            'type' => $request->type,
            'category' => $request->category,
            'notes' => $request->notes,
        ]);

        return redirect()->route('transaction.index')->with('success', 'Transaction updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transaction.index')->with('success', 'Transaction deleted');
    }
}
