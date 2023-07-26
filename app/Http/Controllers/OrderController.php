<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\Product;

class OrderController extends Controller
{
    public function index() 
    {
        $userAuth = auth()->user()->id;
        $transactions = Transaction::where('user_id', $userAuth)->get();
        // $transactionItems = TransactionItem::whereIn('product_id', $productBuy)->get();
        return view('orders.index', [
            'transactions' => $transactions,
            'products' => Product::all(),
        ]);
    }

    public function detail(Transaction $transaction)
    {
        return view('orders.detail', [
            'products' => Product::all(),
            'transactions' => $transaction,
            'transactionItems' => TransactionItem::where('transaction_id', $transaction->id)->get()
        ]);
    }
}
