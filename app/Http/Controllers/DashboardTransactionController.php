<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\Product;

class DashboardTransactionController extends Controller
{
    public function showNew()
    {
        $outletAuth = auth()->user()->outlet->id;
        $productBuy = Product::where('outlet_id', $outletAuth)->pluck('id');
        $transactionItems = TransactionItem::whereIn('product_id', $productBuy)->get();
        $transactionIds = $transactionItems->pluck('transaction_id')->unique();
        $transactions = Transaction::whereIn('id', $transactionIds)
                                    ->where('payment_status', 'new')
                                    ->get();
        return view('dashboard.transactions.new.index', [
            'transactions' => $transactions,
        ]);
    }

    public function confirmation(Transaction $transaction) 
    {
        return view('dashboard.transactions.detail', [
        'transaction' => $transaction,
        'transactionItems' => TransactionItem::where('transaction_id', $transaction->id)->get()
        ]);
    }

    public function changeStatus(Request $request, Transaction $transaction)
    {
        $validateData = $request->validate([
            'payment_status' => 'required'
        ]);

        $transaction->payment_status = $validateData['payment_status'];
        $transaction->save();

        return redirect('/dashboard/transaction/new')->with('success', 'Payment has been confirmated!');
    }

    public function showComplete()
    {
        $outletAuth = auth()->user()->outlet->id;
        $productBuy = Product::where('outlet_id', $outletAuth)->pluck('id');
        $transactionItems = TransactionItem::whereIn('product_id', $productBuy)->get();
        $transactionIds = $transactionItems->pluck('transaction_id')->unique();
        $transactions = Transaction::whereIn('id', $transactionIds)
                                    ->where('payment_status', 'completed')
                                    ->get();
        
        return view('dashboard.transactions.complete.index', [
            'transactions' => $transactions,
        ]);
    }

    public function detailComplete(Transaction $transaction) 
    {
        return view('dashboard.transactions.detail', [
        'transaction' => $transaction,
        'transactionItems' => TransactionItem::where('transaction_id', $transaction->id)->get()
        ]);
    }

    public function showReject()
    {
        $outletAuth = auth()->user()->outlet->id;
        $productBuy = Product::where('outlet_id', $outletAuth)->pluck('id');
        $transactionItems = TransactionItem::whereIn('product_id', $productBuy)->get();
        $transactionIds = $transactionItems->pluck('transaction_id')->unique();
        $transactions = Transaction::whereIn('id', $transactionIds)
                                    ->where('payment_status', 'reject')
                                    ->get();
        
        return view('dashboard.transactions.reject.index', [
            'transactions' => $transactions,
        ]);
    }

    public function detailReject(Transaction $transaction) 
    {
        return view('dashboard.transactions.detail', [
        'transaction' => $transaction,
        'transactionItems' => TransactionItem::where('transaction_id', $transaction->id)->get()
        ]);
    }


}
