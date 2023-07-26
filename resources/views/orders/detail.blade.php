@extends('layouts.main')
@section('container')

<section class="blog-banner-area" id="category">
   <div class="container h-60">
      <div class="blog-banner">
         <div class="text-center">
            <h1>ORDER DETAILS</h1>
         </div>
      </div>
   </div>
</section>


<section class="section-margin--small mb-5">
   <div class="container">
      <div class="row">

         <div class="col-xl-9 col-lg-8 col-md-7">
            <section class="lattest-product-area pb-40 category-list">
               <div class="row">
                  @foreach ($transactionItems as $item)
                  <div class="col-md-6 col-lg-4">
                     <div class="card text-center card-product">
                        <div class="card-product__img">
                           <h6 class="badge badge-primary">Qty : {{ $item->quantity }}</h6> <!-- Tambahkan elemen span dengan kelas badge dan tampilkan quantity -->
                           <img class="card-img" src="{{ asset('storage/'. $item->product->photo_1) }}" style="height: 255px; object-fit:cover;" alt="">
                           <ul class="card-product__imgOverlay">
                              <li>
                                 <p class="card-product__price text-dark">Rp. {{ number_format($item->product->harga, 2, ',', '.') }}</p>
                              </li>
                           </ul>
                        </div>
                        <div class="card-body">
                           @if ($item->product->category_id == null)
                           <p>No Category</p>
                           @else
                           <p>{{ $item->product->category->name }}</p>
                           @endif
                           <h4 class="card-product__title"><a href="/shop/product-{{ $item->product->id }}">{{ $item->product->name }}</a></h4>
                        </div>
                     </div>
                  </div>

                  @endforeach
               </div>
            </section>
         </div>
      </div>
   </div>
</section>

@endsection