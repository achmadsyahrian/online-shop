@extends('dashboard.layouts.main')
@section('container')

   <h1>{{ $product->name }}</h1>
   <div class="d-flex align-items-center">
      @if ($product->category_id == null)
         <p> No Cattegory <i class="ti ti-tag-off"></i></p>
      @else
         <p> {{ $product->category->name }} <i class="ti ti-tags"></i></p>
      @endif
      <div class="ms-auto">
         <p class="fw-bolder text-primary">
            <i class="fa-solid fa-store text-warning"></i> {{ $product->outlet->name }}
         </p>
      </div>
   </div>
   <hr>
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div id="carouselExample" class="carousel slide">
               <div class="carousel-inner">

                     <div class="carousel-item active">
                        <img src="{{ asset('storage/' . $product->photo_1) }}" class="d-block w-100" style="height:400px; object-fit:cover;" alt="Product Image">
                     </div>

                     @if ($product->photo_2)
                        <div class="carousel-item">
                           <img src="{{ asset('storage/' . $product->photo_2) }}" class="d-block w-100" style="height:400px; object-fit:cover;" alt="Product Image">
                        </div>
                     @endif

                     @if ($product->photo_3)
                        <div class="carousel-item">
                           <img src="{{ asset('storage/' . $product->photo_3) }}" class="d-block w-100" style="height:400px; object-fit:cover;" alt="Product Image">
                        </div>
                     @endif
               </div>
               <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
               </button>
               <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
               </button>
            </div>
            <div class="card-body">
               <h5 class="card-title">Rp. {{ number_format($product->harga, 2, ',', '.') }}</h5>
               <h6>Stock : <span class="badge bg-success rounded-3 fw-semibold">{{ $product->stock }}</span></h6>
               <hr>
               <p class="card-text">{!! $product->description !!}</p>
               <hr>
               <a href="/dashboard/products" class="btn btn-primary me-2"><i class="ti ti-arrow-left"></i> Back</a>
               <a href="/dashboard/products/{{ $product->id }}/edit" class="btn btn-warning me-2"><i class="ti ti-edit"></i> Edit</a>
               <form action="/dashboard/products/{{ $product->id }}" method="POST" class="d-inline" id="formDelete">
                  @method('delete')
                  @csrf
                  <button href="/dashboard/products" onclick="event.preventDefault(); deleteData();" class="btn btn-danger">
                     <i class="ti ti-trash"></i> Delete
                  </button>
               </form>
            </div>
         </div>
      </div>
   </div>

@endsection