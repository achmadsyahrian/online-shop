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
            <h1>LIST ORDERS</h1>
         </div>
      </div>
   </div>
</section>


<section class="cart_area">

   <div class="container">
      <div class="cart_inner">
         <div class="table-responsive">
            <table class="table">
               <thead>
                  <tr class="text-center">
                     <th scope="col">Action</th>
                     <th scope="col">Orders Date</th>
                     <th scope="col">Grand Total</th>
                     <th scope="col">Payment Method</th>
                     <th scope="col">Status</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($transactions as $transaction)
                  <tr class="text-center">
                     <td>
                        <div class="col-lg-5 offset-lg-1">
                           <div class="s_product_text mb-4">
                              <div class="card_area position-relative" style="padding-bottom:30px">
                                 <a href="orders/{{ $transaction->id }}">
                                    <button class="icon_btn border-0" href="#"><i class="fa-solid fa-eye"></i></button>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </td>
                     <td>
                        <h5>{{ $transaction->payment_date }}</h5>
                     </td>
                     <td>
                        <h5>Rp. {{ number_format($transaction->grand_total, 2, ',', '.') }}</h5>
                     </td>
                     <td>
                        <h5>
                           @if ($transaction->payment_method == "e_wallet")
                               E - Wallet
                           @else
                               Bank Transfer
                           @endif
                        </h5>
                     </td>
                     <td>
                        @if ($transaction->payment_status == "new")
                           <p class="badge badge-warning text-light py-2 px-4">
                              Belum diverifikasi <i class="fa-sharp fa-solid fa-triangle-exclamation"></i>
                           </p>
                        @elseif($transaction->payment_status == "completed") 
                           <p class="badge badge-success text-light py-2 px-4">
                              Pesanan Selesai <i class="fa-solid fa-check"></i>
                           </p>
                        @else
                           <p class="badge badge-danger text-light py-2 px-4">  
                              Pesanan Ditolak <i class="fa-solid fa-x"></i>
                           </p>
                        @endif
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</section> 

@endsection