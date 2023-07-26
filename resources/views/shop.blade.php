@extends('layouts.main')
@section('container')

<section class="blog-banner-area" id="category">
   <div class="container h-60">
      <div class="blog-banner">
         <div class="text-center">
         <h1>SHOP</h1>
         </div>
      </div>
   </div>
</section>

<section class="section-margin--small mb-5">
   <div class="container">
      <div class="row">

         <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center ">
               <div>
                  <form action="/shop">
                  <div class="input-group filter-bar-search">
                        @csrf
                        <input type="text" name="search" value="{{ request('search') }}" style="width:250px;" placeholder="Search">
                        <div class="input-group-append">
                           <button type="submit"><i class="ti-search"></i></button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <!-- End Filter Bar -->
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
               <div class="row">
                  @if ($products->count())
                     @foreach ($products as $product)
                     <div class="col-md-6 col-lg-4">
                        <div class="card text-center card-product">
                           <div class="card-product__img">
                              <img class="card-img" src="{{ asset('storage/'. $product->photo_1) }}"
                                 style="height: 255px; object-fit:cover;" alt="">
                              <ul class="card-product__imgOverlay">
                                 <li>
                                    <p class="card-product__price text-dark">Rp. {{ number_format($product->harga, 2, ',',
                                       '.') }}</p>
                                 </li>
                              </ul>
                           </div>
                           <div class="card-body">
                              @if ($product->category_id == null)
                              <p>No Category</p>
                              @else
                              <p>{{ $product->category->name }}</p>
                              @endif
                              <h4 class="card-product__title"><a href="/shop/product-{{ $product->id }}">{{ $product->name }}</a></h4>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
                  <nav class="blog-pagination justify-content-center d-flex">
                     <ul class="pagination">
                        <li class="page-item">
                           {{ $products->links() }}
                        </li>
                     </ul>
                  </nav>
               @else
               <div class="col-md-12 mt-3">
                  <p class="text-center fs-4">No Product Found.</p>
                  </div>
               @endif
            </section>
            <!-- End Best Seller -->
         </div>
         <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="single-search-product-wrapper">
               <div class="section-intro pb-60px">
                  <h2><span class="section-intro__style"> New</span> Product</h2>
               </div>
               {{-- Product terbaru --}}
               @foreach ($newProducts->take(5) as $newProduct)
                  <div class="single-search-product d-flex">
                     <a href="#"><img src="{{ asset('storage/'. $newProduct->photo_1) }}" style="height:75px; object-fit:cover; border-radius:7px;" alt=""></a>
                     <div class="desc">
                        <a href="/shop/product-{{ $newProduct->id }}" class="title">{{ $newProduct->name }}</a>
                        <div class="price">Rp. {{ number_format($newProduct->harga, 2, ',', '.') }}</div>
                     </div>
                  </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</section>



@endsection