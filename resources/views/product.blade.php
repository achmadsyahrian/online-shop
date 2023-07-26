@extends('layouts.main')
@section('container')
<div class="product_image_area">
   <div class="container">
      <div class="row s_product_inner">
         <div class="col-lg-6">

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
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
               <button class="carousel-control-prev" style="border:none; background:none;" type="button" data-target="#carouselExampleControls" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
               </button>
               <button class="carousel-control-next" style="border:none; background:none;" type="button" data-target="#carouselExampleControls" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
               </button>
            </div>


            {{-- <div class="owl-carousel owl-theme s_Product_carousel">
               <div class="single-prd-item">
                  <img class="img-fluid" src="{{ asset('storage/'. $product->photo_1) }}"
            style="width:537px; height:530px; object-fit:cover;" alt="">
         </div>
         @if ($product->photo_2)
         <div class="single-prd-item">
            <img class="img-fluid" src="{{ asset('storage/'. $product->photo_2) }}" style="width:537px; height:530px; object-fit:cover;" alt="">
         </div>
         @elseif($product->photo_3)
         <div class="single-prd-item">
            <img class="img-fluid" src="{{ asset('storage/'. $product->photo_3) }}" style="width:537px; height:530px; object-fit:cover;" alt="">
         </div>
         @endif
      </div> --}}
   </div>
   <div class="col-lg-5 offset-lg-1">
      <div class="s_product_text">
         <h3>{{ $product->name }}</h3>
         <h2>Rp. {{ number_format($product->harga, 2, ',', '.') }}</h2>
         <ul class="list">
            <li><a class="active" href="#"><span>Category</span> :
                  {{ isset($product->category_id) ? $product->category->name : '-' }}</a>
            </li>
            <li>
               <a href="#" class="{{ $product->stock > 0 ? 'text-success' : 'text-danger' }}"><span>Stock</span> :
                  {{ number_format($product->stock, 0, '.', '.') }}</a>
            </li>
         </ul>
         <br>
         <br>
         <br>
         <div class="">
            <label for="qty">Quantity:</label>
            <form action="{{ route('cart.add') }}" method="POST">
               @csrf
               <input type="hidden" name="product_id" value="{{ $product->id }}">
               <input type="number" name="qty" id="sst" size="2" maxlength="12" value="1" title="Quantity:" class="input-text qty" min="1">
               <button type="submit" class="btn btn-primary" style="width: 170px; height:50px; border-radius:25px; ">
                  <i class="ti-shopping-cart"></i> Add to Cart
               </button>
            </form>
         </div>
      </div>
   </div>
</div>
</div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
   <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
         <li class="nav-item">
            <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" id="outlet-tab" data-toggle="tab" href="#outlet" role="tab" aria-controls="outlet" aria-selected="false">Outlet</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
         </li>
      </ul>
      <div class="tab-content" id="myTabContent">
         <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
            <p>{!! $product->description !!}</p>
         </div>
         <div class="tab-pane fade" id="outlet" role="tabpanel" aria-labelledby="outlet-tab">
            <div class="table-responsive">
               <table class="table">
                  <tbody>
                     <tr>
                        <td>
                           <h5>Name</h5>
                        </td>
                        <td>
                           <h5>{{ $product->outlet->name }}</h5>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <h5>Address</h5>
                        </td>
                        <td>
                           <h5>{{ $product->outlet->address }}</h5>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <h5>No. Telphone</h5>
                        </td>
                        <td>
                           <h5>{{ implode('-', str_split($product->outlet->phone, 4)) }}</h5>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="comment_list mt-5">
               <div class="review_item">
                  <div class="media">
                     <div class="media-body">
                        <h3 class="text-center">About Us</h3>
                     </div>
                  </div>
                  @if ($product->outlet->description)
                  <p>{!! $product->outlet->description !!}</p>
                  @else
                  <h6 class="text-center mt-4 text-secondary"><i class="fa-solid fa-circle-xmark "></i> No
                     Description</h6>
                  @endif
               </div>
            </div>
         </div>
         <div class="tab-pane fade show" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
            <div class="row">
               @php
                  $mergedItems = $rates->merge($qualities);
               @endphp
               @foreach ($rates as $index => $rate)                   
                  <div class="col-lg-6 mb-5 text-center">
                     <div class="review_list">
                        <div class="review_item">
                           <div class="media">
                              <div class="media-body">
                                 <h4>{{ $rate->user->name }}</h4>
                                 <p>Kualitas Produk: {{ $qualities[$index]->description }}</p>
                                 @php
                                    $rating = $rate->rating; // Gantilah dengan nilai rating dari database
                                    $stars = ceil($rating / 2);
                                 @endphp
                                 @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $stars)
                                       <i class="fa fa-star" data-value="{{ $i }}"></i>
                                    @else
                                       <i class="fa fa-star-o" data-value="{{ $i }}"></i>
                                    @endif
                                 @endfor
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>  
               @endforeach
            </div>
         </div>
      </div>
   </div>

</section>
<!--================End Product Description Area =================-->
@endsection
