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
                        @php
                           $userAuth = auth()->user()->id;
                           $transactionStatus = $item->transaction->payment_status; // Ambil status transaksi dari relasi Transaction
                           $rating = \App\Models\Rate::where('user_id', $userAuth)
                                                   ->where('transaction_item_id', $item->id)
                                                   ->first();
                           $quality = \App\Models\Quality::where('user_id', $userAuth)
                                                   ->where('transaction_item_id', $item->id)
                                                   ->first();
                        @endphp
                        @if($transactionStatus === 'completed')
                           @if($rating && $quality)
                              <div class="text-center">
                                    <button type="submit" class="btn btn-success text-center" style="width:200px; margin-top:10px; border-radius:25px;">
                                       <i class="ti-check"></i> Already Reviewed
                                    </button>
                              </div>
                           @else
                              <form action="/review" method="post">
                                    @csrf
                                    <div class="row">
                                       <div class="col-sm-6">
                                          <label for="">Rate <i class="fa fa-star text-warning"></i> </label>
                                          <input type="number" name="rating" placeholder="1 - 10" title="Quantity:" class="form-control input-text" min="1" max="10" required>
                                       </div>
                                       <div class="col-sm-6">
                                          <label for="">Product Quality</label>
                                          <select name="description" class="form-control">
                                             <option value="Sangat Buruk">1</option>
                                             <option value="Buruk">2</option>
                                             <option value="Standart">3</option>
                                             <option value="Baik">4</option>
                                             <option value="Sangat Baik">5</option>
                                          </select>
                                       </div>
                                    </div>
                                    <input type="hidden" name="transaction_item_id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-warning" style="width:200px; margin-top:10px; border-radius:25px; ">
                                       <i class="ti-star"></i> Rate
                                    </button>
                              </form>
                           @endif
                        @endif

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