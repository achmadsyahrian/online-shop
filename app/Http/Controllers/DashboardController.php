<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\TransactionItem;
use App\Models\Transaction;
class DashboardController extends Controller
{
    public function index()
    {
        $outletAuth = auth()->user()->outlet->id;

        $productBuy = Product::where('outlet_id', $outletAuth)->pluck('id');
        
        // 1. Data total grand_total dari transaksi yang memiliki transaction_id dengan product_id sesuai outlet yang login
        $totalGrandTotal = Transaction::whereIn('id', function ($query) use ($productBuy) {
            $query->select('transaction_id')
                ->from('transaction_items')
                ->whereIn('product_id', $productBuy);
        })
        ->where('payment_status', 'completed') // Menambahkan kondisi payment_status
        ->sum('grand_total');


        // 2. Data total produk yang memiliki outlet_id sesuai outlet user yang login
        $totalProducts = Product::where('outlet_id', $outletAuth)->count();

        // 3. Data total pesanan yang memiliki payment_status = completed
        $totalCompletedOrders = Transaction::whereIn('id', 
            function ($query) use ($productBuy) {
                $query->select('transaction_id')
                    ->from('transaction_items')
                    ->whereIn('product_id', $productBuy);
            }
        )
        ->where('payment_status', 'completed') // Menambahkan kondisi payment_status
        ->count();

        return view('dashboard.index', [
            'totalGrandTotal' => $totalGrandTotal,
            'totalProducts' => $totalProducts,
            'totalCompletedOrders' => $totalCompletedOrders
        ]);
    }

}
