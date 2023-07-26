@extends('layouts.main')
@section('container')

@if (session()->has('success'))
<div class="alert alert-success text-center mt-4" role="alert">
   {{ session('success') }} <i class="fa-solid fa-circle-check"></i>
</div>
@endif


<section class="blog-banner-area" id="category">
   <div class="container h-60">
      <div class="blog-banner">
         <div class="text-center">
         <h1>SHOPPING CART </h1>
         </div>
      </div>
   </div>
</section>
    

<section class="cart_area">

   <div class="container">
      <div class="cart_inner">
         <div class="table-responsive">
            <table class="table">
               @if ($productsCart->count())
               <thead>
                  <tr>
                     <th scope="col">Product</th>
                     <th scope="col">Price</th>
                     <th scope="col">Quantity</th>
                     <th scope="col" width="200px">Total</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @php
                  $totalPrice = 0;
                  @endphp
                  @foreach ($productsCart as $product)
                  <tr>
                     <td>
                        <div class="media">
                           <div class="d-flex">
                              <img src="{{ asset('storage/'. $product->photo_1) }}"
                                 style="width:100px; height:100px; object-fit:cover;" alt="" />
                           </div>
                           <div class="media-body">
                              <p>{{ $product->name }}</p>
                           </div>
                        </div>
                     </td>
                     <td>
                        <h5>Rp. {{ number_format($product->harga, 2, ',', '.') }}</h5>
                     </td>
                     <td>
                        <div class="product_count">
                           <input type="text" name="qty" id="sst" maxlength="12"
                              value="{{ $cart[$product->id]['quantity'] }}" title="Quantity:" class="input-text qty"
                              readonly />
                        </div>
                     </td>
                     <td>
                        <h5>Rp. {{ number_format($product->harga * $cart[$product->id]['quantity'], 2, ',', '.') }}</h5>
                     </td>
                     <td style="text-align: right; vertical-align: middle;" class="text-center">
                        <div class="col-lg-5 offset-lg-1">
                           <div class="s_product_text mb-4">
                              <div class="card_area position-relative" style="padding-bottom:30px">
                                 <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button class="icon_btn border-0" href="#"><i class="fa-solid fa-x"></i></button>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </td>
                  </tr>
                  @php
                  $subtotal = $product->harga * $cart[$product->id]['quantity'];
                  $totalPrice += $subtotal;
                  @endphp
                  @endforeach
                  <tr>
                     <td></td>
                     <td></td>
                     <td>
                        <h5>Subtotal</h5>
                     </td>
                     <td>
                        <h5>Rp. {{ number_format($totalPrice, 2, ',', '.') }}</h5>
                     </td>
                  </tr>
                  <tr class="out_button_area">
                     <td class="d-none-l"></td>
                     <td class=""></td>
                     <td></td>
                     <td>
                        <div class="checkout_btn_inner d-flex align-items-center justify-content-end">
                           <a class="primary-btn ml-2" href="/checkout">Checkout</a>
                        </div>
                     </td>
                  </tr>
                  @else
                     <p class="text-center">There are no items in the cart</p>
                  @endif
               </tbody>
            </table>
         </div>
      </div>
   </div>
</section>

@endsection