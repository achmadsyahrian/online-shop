<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index() {
        $cart = session()->get('cart', []); //ambil data cart dari session
        $productId = array_keys($cart); //ambil id produk
        $products = Product::whereIn('id', $productId)->get(); //tampilkan sesuai id 
        return view('cart', [
            'products' => Product::all(),
            'productsCart' => $products,
            'cart' => $cart
        ]);
    }

    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('qty');

        $cart = session()->get('cart', []);

        // Cek apakah ada produk dengan outlet yang berbeda dalam keranjang
        $existingProductOutlet = null;
        $productOutletId = Product::find($productId)->outlet_id;
        foreach ($cart as $cartProductId => $cartProduct) {
            $product = Product::find($cartProductId);
            if ($product->outlet_id !== $productOutletId) {
                $existingProductOutlet = $product->outlet_id;
                break;
            }
        }

        // Jika ada produk dengan outlet yang berbeda, hapus semua produk dalam keranjang
        if ($existingProductOutlet && $existingProductOutlet !== $productOutletId) {
            $cart = [];
        }

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Item added to cart');
    }


    public function remove(Request $request)
    {
        $productId = $request->input('product_id');

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Item removed from cart');
    }

 
}
