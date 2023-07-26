<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionItem;

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
        $userAuth = auth()->user()->id;
        $transactionItems = TransactionItem::where('transaction_id', $transaction->id)->get();
        $ratings = Rate::where('user_id', $userAuth);
        $transactionItemIds = $transactionItems->pluck('id'); // Mengambil semua transaction_item_id
        $ratings->whereIn('transaction_item_id', $transactionItemIds);

        $ratings = $ratings->get();


        return view('orders.detail', [
            'products' => Product::all(),
            'transactions' => $transaction,
            'transactionItems' => $transactionItems,
            'rates' => $ratings
        ]);
    }
}
