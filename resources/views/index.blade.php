@extends('layouts.main')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success text-center mt-4" role="alert">
            {{ session('success') }} <i class="fa-solid fa-circle-check"></i>
        </div>
    @endif
    <section class="hero-banner">
        <div class="container">
            <div class="row no-gutters align-items-center pt-60px">
                <div class="col-5 d-none d-sm-block">
                    <div class="hero-banner__img">
                        <img class="img-fluid" src="img/home/hero-banner.png" alt="">
                    </div>
                </div>
                <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
                    <div class="hero-banner__content">
                        <h4>Shop is fun</h4>
                        <h1>Jelajahi Produk Premium Kami</h1>
                        <p>Selamat datang di toko online resmi kami, tempat di mana kepuasan Anda adalah prioritas utama
                            kami.
                            Jelajahi berbagai pilihan produk berkualitas tinggi, dari pakaian fashion hingga peralatan rumah
                            tangga, dan
                            temukan kebutuhan Anda yang paling mendesak.</p>
                        <a class="button button-hero" href="/shop">Browse Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Hero banner start =================-->

    <!--================ Hero Carousel start =================-->
    @if ($products->count())
        <section class="section-margin mt-0">
            <div class="owl-carousel owl-theme hero-carousel">
                @foreach ($products as $product)
                    <div class="hero-carousel__slide">
                        <img src="{{ asset('storage/' . $product->photo_1) }}" style="height: 380px; object-fit:cover;"
                            alt="" class="img-fluid">
                        <a href="/shop/product-{{ $product->id }}" class="hero-carousel__slideOverlay">
                            <h3>{{ $product->name }}</h3>
                            <p>Rp. {{ number_format($product->harga, 2, ',', '.') }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!--================ Hero Carousel end =================-->

    <!-- ================ trending product section start ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Popular Item in the market</p>
                <h2>New <span class="section-intro__style">Product</span></h2>
            </div>
            <div class="row">
                @if ($products->count())
                    @foreach ($products->take(8) as $product)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="card text-center card-product">
                                <div class="card-product__img">
                                    <img class="card-img" src="{{ asset('storage/' . $product->photo_1) }}"
                                        style="height: 255px; object-fit:cover;" alt="">
                                    <ul class="card-product__imgOverlay">
                                        <li>
                                            <p class="card-product__price text-dark">Rp.
                                                {{ number_format($product->harga, 2, ',', '.') }}</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    @if ($product->category_id == null)
                                        <p>No Category</p>
                                    @else
                                        <p>{{ $product->category->name }}</p>
                                    @endif
                                    <h4 class="card-product__title"><a
                                            href="/shop/product-{{ $product->id }}">{{ $product->name }}</a></h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="/shop" class="button button-postComment text-center button--active">See More</a>
                </div>
            </div>
        @else
            <div class="container">
                <p class="text-center fs-4">No Product Found.</p>
            </div>
            @endif
        </div>
    </section>
    <!-- ================ trending product section end ================= -->

    <!-- ================ trending product section start ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Best seller product</p>
                <h2>Best Seller <span class="section-intro__style">Product</span></h2>
            </div>
            <div class="row">
                @if ($best_seller->count())
                    @foreach ($best_seller->take(10) as $product)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="card text-center card-product">
                                <div class="card-product__img">
                                    <img class="card-img" src="{{ asset('storage/' . $product->photo_1) }}"
                                        style="height: 255px; object-fit:cover;" alt="">
                                    <ul class="card-product__imgOverlay">
                                        <li>
                                            <p class="card-product__price text-dark">Rp.
                                                {{ number_format($product->harga, 2, ',', '.') }}</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    @if ($product->category_id == null)
                                        <p>No Category</p>
                                    @else
                                        <p>{{ $product->category->name }}</p>
                                    @endif
                                    <h4 class="card-product__title"><a
                                            href="/shop/product-{{ $product->id }}">{{ $product->name }}</a></h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="/shop" class="button button-postComment text-center button--active">See More</a>
                </div>
            </div>
        @else
            <div class="container">
                <p class="text-center fs-4">No Product Found.</p>
            </div>
            @endif
        </div>
    </section>
    <!-- ================ trending product section end ================= -->

    <!-- ================ trending product section start ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Best of product</p>
                <h2>Best of <span class="section-intro__style">Product</span></h2>
            </div>
            <div class="row">
                @php
                    $totalS = 0;
                    $hasilArr = collect([]);
                @endphp
                @foreach ($productBobot as $products)
                    @php
                        $trItemQuality = collect($products->transactionItem);
                        $trItemQualityAvg = $trItemQuality->avg('quality_avg_description');

                        $trItem = collect($products->transactionItem);
                        $trItemAvg = $trItem->avg('rate_avg_rating');
                    @endphp

                    @foreach ($bobot as $bobotItem)
                        @php
                            $nilai = $bobotItem->bobot / $sumBobot;
                            $hasil = ($trItemQualityAvg ** $nilai) * ($trItemAvg ** $nilai) * ($products->harga ** $nilai) * ($products->transaction_item_sum_quantity ** $nilai);
                        @endphp

                    @endforeach
                    @php
                        $totalS+=$hasil
                    @endphp
                @endforeach

                @foreach ($productBobot as $item)
                    @php
                        $trItemQuality = collect($item->transactionItem);
                        $trItemQualityAvg = 4;

                        $trItem = collect($item->transactionItem);
                        $trItemAvg = $item->ketahanan;
                    @endphp

                    @foreach ($bobot as $bobotItem)
                        @php
                            $nilai = $bobotItem->bobot / $sumBobot;
                            $hasil = ($trItemQualityAvg ** $nilai) * ($trItemAvg ** $nilai) * ($item->harga ** $nilai) * ($item->transaction_item_sum_quantity ** $nilai);
                        @endphp

                    @endforeach
                    @php
                        $totalV = $hasil / $totalS;
                        $hasilArr->push([
                            'id' => $item->id,
                            'name' => $item->name,
                            'harga' => $item->harga,
                            'jlh_beli' => $item->transaction_item_sum_quantity,
                            'totalV' => $totalV,
                            'totalS' => $hasil,
                            'itemQuality' => $trItemQualityAvg,
                            'itemRate' => $trItemAvg,
                            'photo_1' => $item->photo_1,
                        ]);
                    @endphp

                @endforeach

                @php
                    $hasilArr = $hasilArr->sortByDesc('totalV');
                @endphp

                @if ($hasilArr->count())
                    @foreach ($hasilArr->take(10) as $product)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="card text-center card-product">
                                <div class="card-product__img">
                                    <img class="card-img" src="{{ asset('storage/' . $product['photo_1']) }}"
                                        style="height: 255px; object-fit:cover;" alt="">
                                    <ul class="card-product__imgOverlay">
                                        <li>
                                            <p class="card-product__price text-dark">Rp.
                                                {{ number_format($product['harga'], 2, ',', '.') }}</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    {{-- @if ($product->category_id == null)
                                        <p>No Category</p>
                                    @else
                                        <p>{{ $product->category->name }}</p>
                                    @endif --}}
                                    <h4 class="card-product__title"><a
                                            href="/shop/product-{{ $product['id'] }}">{{ $product['name'] }}</a></h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="/shop" class="button button-postComment text-center button--active">See More</a>
                </div>
            </div>
        @else
            <div class="container">
                <p class="text-center fs-4">No Product Found.</p>
            </div>
            @endif
        </div>
    </section>
    <!-- ================ trending product section end ================= -->


    <!-- ================ Subscribe section start ================= -->
    <section class="subscribe-position">
        <div class="container">
            <div class="subscribe text-center">
                <h3 class="subscribe__title">Terima kasih telah berkunjung</h3>
                <p>Kenyamanan dan Kepuasan Belanja dalam Genggaman Anda!</p>
            </div>
        </div>
    </section>

@endsection
