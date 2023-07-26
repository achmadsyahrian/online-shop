<?php

use App\Models\Rate;
use App\Models\Outlet;
use App\Models\Product;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CreateOutletController;
use App\Http\Controllers\DashboardTransactionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// =================================================================================================================
// Main Section
Route::get('/', function () {
    return view('index', [
        'products' => Product::latest()->get()
    ]);
});

Route::get('/shop', function() {
    return view('shop', [
        'products' => Product::filter(request(['search']))->paginate(9)->withQueryString(),
        'newProducts' => Product::latest()->get()
    ]);
});

Route::get('/shop/product-{product:id}', [ProductController::class, 'detail']);


// =================================================================================================================
// Transaction Section
Route::get('/checkout', [TransactionController::class, 'index'])->middleware('auth');
Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.add')->middleware('auth');
Route::get('/confirmation', function() {
    return view('confirmation');
});



// =================================================================================================================
// Cart Section
Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add')->middleware('auth');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove')->middleware('auth');


// =================================================================================================================
// Dashboard / Outlet Section
Route::get('/orders', [OrderController::class, 'index'])->middleware('auth');
Route::get('/orders/{transaction:id}', [OrderController::class, 'detail'])->middleware('auth');


// =================================================================================================================
// Dashboard / Outlet Section
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('toko');

Route::resource('/dashboard/products', ProductController::class)->middleware('toko');
Route::resource('/dashboard/categories', CategoryController:: class)->middleware('toko');

Route::get('/create-outlet', [CreateOutletController::class, 'index'])->middleware('auth');
Route::post('/create-outlet', [CreateOutletController::class, 'store'])->middleware('auth');


// =================================================================================================================
// Authentication Section
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


// =================================================================================================================
// Dashboard Transaction Section
Route::get('/dashboard/transaction/new', [DashboardTransactionController::class, 'showNew'])->middleware('toko');
Route::get('/dashboard/transaction/new/{transaction:id}', [DashboardTransactionController::class, 'confirmation'])->middleware('toko');
Route::put('/dashboard/transaction/new/{transaction}', [DashboardTransactionController::class, 'changeStatus'])->name('transaction.update')->middleware('toko');

Route::get('/dashboard/transaction/completed', [DashboardTransactionController::class, 'showComplete'])->middleware('toko');
Route::get('/dashboard/transaction/completed/{transaction:id}', [DashboardTransactionController::class, 'detailComplete'])->middleware('toko');

Route::get('/dashboard/transaction/rejected', [DashboardTransactionController::class, 'showReject'])->middleware('toko');
Route::get('/dashboard/transaction/rejected/{transaction:id}', [DashboardTransactionController::class, 'detailReject'])->middleware('toko');


Route::post('/review', [ReviewController::class, 'store']);

