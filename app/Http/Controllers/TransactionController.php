<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\District;
use App\Models\Province;
use App\Models\Regencies;
use App\Models\Transaction;
use Illuminate\Http\Request;
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
            'cart' => $cart,
            'provinces' => Province::all(),
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
            'user_id' => auth()->user()->id,
            'payment_method' => $validateData['payment_method'],
            'payment_date' => now()->toDateString(),
            'payment_status' => 'new',
            'provinsi' => $request->input('provinsi'),
            'kabupaten' => $request->input('kabupaten'),
            'kecamatan' => $request->input('kecamatan'),
            'alamat' => $request->input('alamat_lengkap'),
            'grand_total' => 0,
            'image' => $request->file('image')->store('transaction-image'),
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

    // Untuk Alamat Detail Transaksi
    // Tampilkan kabupaten sesuai provinsi yg dipilih user
    public function getKabupaten(Request $request) {
        $namaProvinsi = $request->namaProvinsi;
        $idProvinsi = Province::where('name', $namaProvinsi)->first();
        $kabupatens = Regencies::where('province_id', $idProvinsi->id)->get();
        foreach ($kabupatens as $kabupaten) {
            echo "<option value='$kabupaten->name'>$kabupaten->name</option>";
        }
    }

    // Tampilkan kecamatan sesuai kabupaten yg dipilih user
    public function getKecamatan(Request $request) {
        $namaKabupaten = $request->namaKabupaten;
        $idKabupaten = Regencies::where('name', $namaKabupaten)->first();
        $kecamatans = District::where('regency_id', $idKabupaten->id)->get();
        foreach ($kecamatans as $kecamatan) {
            echo "<option value='$kecamatan->name'>$kecamatan->name</option>";
        }
    }
    
}
