@extends('dashboard.layouts.main')
@section('container')

<div class="row">
   @if ($transaction->payment_status == "completed")    
      <div class="alert alert-success text-center fs-5" role="alert">
         Transaction Completed <i class="fa-solid fa-circle-check"></i>
      </div>
   @elseif($transaction->payment_status == "reject")
      <div class="alert alert-danger text-center fs-5" role="alert">
         Transaction Rejected <i class="fa-solid fa-triangle-exclamation"></i>
      </div>
   @endif
   <h2>List Ordered Product</h2>
   <hr>
   @foreach ($transactionItems as $item)
      <div class="col-sm-6 col-xl-3">
         <div class="card overflow-hidden rounded-2">
            <div class="position-relative">
               <a href="/dashboard/products/{{ $item->product->id }}"><img src="{{ asset('storage/'. $item->product->photo_1) }}" style="height:250px; object-fit:cover;" class="card-img-top rounded-0" alt="..." /></a>
               <p class="bg-primary w-20 h-20 p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3"
                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart">{{ $item->quantity }}</p>
            </div>
            <div class="card-body pt-3 p-4">
               <h6 class="fw-semibold fs-4">{{ $item->product->name }}</h6>
               <div class="d-flex align-items-center justify-content-between">
                  <h6 class="fw-semibold fs-4 mb-0">
                     Rp. {{ number_format($item->product->harga, 2, ',', '.') }}
                  </h6>
               </div>
            </div>
         </div>
      </div>
   @endforeach

</div>
<div class="row mt-5">
   <h2>Transaction Detail</h2>
   <hr>
   <div class="col-md-12">
      <div class="card">
         <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <h5 class="card-title">Bukti Pembayaran :</h5>
                  <img src="{{ asset('storage/'. $transaction->image) }}" class="d-block w-100"
                     style="height:400px; object-fit:cover;" alt="Product Image">
               </div>
            </div>
         </div>
         <div class="card-body">
            <h5 class="card-title">Total Bayar :</h5>
            <h6> Rp. {{ number_format($transaction->grand_total, 2, ',', '.') }}</h6>
            <hr>
            <h5 class="card-title">Metode Pembayaran :</h5>
            <h6><span class="badge bg-warning rounded-3 fw-semibold">
               @if ($transaction->payment_method == "e_wallet")
                  <i class="ti ti-wallet"></i> E - Wallet
               @else 
                  <i class="ti ti-cash"></i> Bank Transfer
               @endif
            </span></h6>
            <hr>
            <h5 class="card-title">Catatan :</h5>
            <p class="card-text">{!! $transaction->description !!}</p>
            <hr>
            @if ($transaction->payment_status === "new")
               <form method="POST" action="{{ route('transaction.update', ['transaction' => $transaction->id]) }}">
                  @csrf
                  @method('put')
                  <input type="radio" class="btn-check" name="payment_status" value="reject" id="reject" >
                  <label class="btn btn-outline-danger" for="reject">Tolak</label>
                  
                  <input type="radio" class="btn-check" name="payment_status" value="completed" id="verif" checked>
                  <label class="btn btn-outline-success" for="verif">Verifikasi Pembayaran</label>
                  <button type="submit" class="btn btn-primary">Submit</button>
               </form> 
            @endif
            <a href="/dashboard/transaction/new" class="btn btn-danger me-2 mt-5"><i class="ti ti-arrow-left"></i> Back</a>
         </div>
      </div>
   </div>
</div>

@endsection