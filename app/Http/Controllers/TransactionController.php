<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;

class TransactionController extends Controller
{
    public function index() 
    {
        $cart = session()->get('cart', []); //ambil data cart dari session
        $productId = array_keys($cart); //ambil id produk
        $products = Product::whereIn('id', $productId)->get(); //tampilkan sesuai id 
        return view('checkout', [
            'products' => Product::all(),
            'productsCart' => $products,
            'cart' => $cart
        ]);
    }
    
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'payment_method' => 'required',
            'image' => 'required|image|file|max:3072',
        ]);

        // Mengimput data ke tabel transaksi
        $transaction = Transaction::create([
            'payment_method' => $validateData['payment_method'],
            'description' => $request->input('description'),
            'payment_date' => now()->toDateString(),
            'payment_status' => 'new',
            'image' => $request->file('image')->store('transaction-image'),
            'user_id' => auth()->user()->id,
            'grand_total' => 0
        ]);

        // Mengimput data ke tabel transaksi_item
        $cart = session('cart');
        $grandTotal = 0;
        foreach ($cart as $productId => $productData) {
            $quantity = $productData['quantity'];
            $product = Product::find($productId);
            if ($product) {
                $subtotal = $product->harga * $quantity;

                TransactionItem::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'sub_total' => $subtotal
                ]);
                $grandTotal += $subtotal;
            }
        }

        $transaction->grand_total = $grandTotal;
        $transaction->save();
        session()->forget('cart');

        return redirect('/')->with('success', 'Thank you. Your order has been received');

    }
}
