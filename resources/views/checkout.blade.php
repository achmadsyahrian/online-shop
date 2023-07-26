@extends('layouts.main')
@section('container')

<section class="blog-banner-area" id="category">
   <div class="container h-100">
      <div class="blog-banner">
         <div class="text-center">
            <h1>PRODUCT CHECKOUT</h1>
         </div>
      </div>
   </div>
</section>

<section class="checkout_area section-margin--small">
   <div class="container">
      <div class="billing_details">
         <div class="row">
            <div class="col-lg-7">
               <h3>Billing Details</h3>
<form class="row contact_form" action="{{ route('transaction.add') }}" enctype="multipart/form-data" method="POST">
                  @csrf
                  <label class="form-label">Upload payment proof photo</label>
                  <div class="custom-file mb-3 form-group">
                     <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" id="validatedCustomFile">
                     <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                     <div class="invalid-feedback">
                        @error('image')
                            {{ $message }}
                        @enderror
                     </div>
                     
                     <label class="form-label mt-3" for="validationTextarea">Description</label>
                     <textarea class="form-control" id="validationTextarea" name="description" placeholder="Order Notes">{{ old('description') }}</textarea>
                  </div>
            </div>
            <div class="col-lg-5">
               <div class="order_box">
                  <h2>Your Order</h2>
                  <ul class="list">
                     <li>
                        <a ><h4>Product <span>Total</span></h4></a>
                     </li>
                     @php
                        use Illuminate\Support\Str;
                        $totalPrice = 0;
                     @endphp
                     @foreach ($productsCart as $product)    
                        <li>
                           <a >{{ Str::limit($product->name, 15) }} <span class="middle">x {{ $cart[$product->id]['quantity'] }}</span> <span class="last">Rp. {{ number_format($product->harga * $cart[$product->id]['quantity'], 2, ',', '.') }}</span></a>
                        </li>
                     @php
                     $subtotal = $product->harga * $cart[$product->id]['quantity'];
                     $totalPrice += $subtotal;
                     @endphp
                     @endforeach
                  </ul>
                  <ul class="list list_2">
                     <li><a >Total <span>Rp. {{ number_format($totalPrice, 2, ',', '.') }}</span></a></li>
                  </ul>
                  <div class="payment_item mt-4">
                     <img src="img/payment_method.png" width="400px" alt="">
                     @error('payment_method')
                        <p class="text-danger text-center">{{ $message }}</p>
                     @enderror
                     <div class="radion_btn">
                        <input type="radio" id="f-option5" name="payment_method" value="bank_transfer">
                        <label class="@error('payment_method') text-danger @enderror" for="f-option5">
                           @error('payment_method') <i class="fa-solid fa-triangle-exclamation"></i> @enderror Bank Transfer
                        </label>
                        <div class="check"></div>
                     </div>
                     <p>
                        BNI : 012xxxxxxx <br>
                        BRI : 012xxxxxxx <br>
                        BCA : 012xxxxxxx <br>
                     </p>
                  </div>
                  <div class="payment_item active">
                     <div class="radion_btn">
                        <input type="radio" id="f-option6" name="payment_method" value="e_wallet">
                        <label class="@error('payment_method') text-danger @enderror" for="f-option6">
                           @error('payment_method') <i class="fa-solid fa-triangle-exclamation"></i> @enderror E-Wallet
                        </label>
                        <div class="check"></div>
                     </div>
                     <p>
                        DANA : 012xxxxxxx <br>
                        OVO : 012xxxxxxx <br>
                        GOPAY : 012xxxxxxx <br>
                     </p>
                  </div>
                  <div class="text-center">
                     <button type="submit" class="button bg-warning border-0 button-paypal" href="#"><i class="fa-regular fa-credit-card"></i> Buy Now</button>
                  </div>
</form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

@endsection






