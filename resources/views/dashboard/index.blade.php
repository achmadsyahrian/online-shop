@extends('dashboard.layouts.main')
@section('container')
<h1>HAL DASHBOARD</h1>
@if (session()->has('success'))
<div class="alert alert-success text-center" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="row">
  <div class="col-lg-12">
    <div class="row">
      <div class="col-lg-4">
        <!-- Monthly Earnings -->
        <div class="card">
          <div class="card-body">
            <div class="row alig n-items-start">
              <div class="col-8">
                <h5 class="card-title mb-9 fw-semibold">
                  Pendapatan
                </h5>
                <h4 class="fw-semibold mb-3">
                  Rp. {{ number_format($totalGrandTotal, 2, ',', '.') }}
                </h4>
              </div>
              <div class="col-4">
                <div class="d-flex justify-content-end">
                  <div
                    class="text-white bg-success rounded-circle p-6 d-flex align-items-center justify-content-center">
                    <i class="ti ti-currency-dollar fs-6"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <!-- Monthly Earnings -->
        <div class="card">
          <div class="card-body">
            <div class="row alig n-items-start">
              <div class="col-8">
                <h5 class="card-title mb-9 fw-semibold">
                  Total Produk
                </h5>
                <h4 class="fw-semibold mb-3">
                  {{ $totalProducts }}
                </h4>
              </div>
              <div class="col-4">
                <div class="d-flex justify-content-end">
                  <div
                    class="text-white bg-primary rounded-circle p-6 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-bag-shopping"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <!-- Monthly Earnings -->
        <div class="card">
          <div class="card-body">
            <div class="row alig n-items-start">
              <div class="col-8">
                <h5 class="card-title mb-9 fw-semibold">
                  Pesanan Selesai
                </h5>
                <h4 class="fw-semibold mb-3">
                  {{ $totalCompletedOrders }}
                </h4>
              </div>
              <div class="col-4">
                <div class="d-flex justify-content-end">
                  <div
                    class="text-white bg-warning rounded-circle p-6 d-flex align-items-center justify-content-center">
                    <i class="ti ti-checklist fs-6"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection