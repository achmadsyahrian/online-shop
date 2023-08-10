@extends('dashboard.layouts.main')
@section('container')
    <h1>Populer Product</h1>
    <hr>
    <div class="row">
        <div class="col-lg-11 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">#</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Image</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Purchased Total</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $pageNumber = ($products->currentPage() - 1) * $products->perPage();
                        @endphp
                        @foreach ($products as $product)                            
                        @php
                          $pageNumber++;
                        @endphp                            
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">
                                        {{ $pageNumber }}
                                    </h6>
                                </td>
                                <td class="border-bottom-0">
                                    <img src="{{ asset('storage/'. $product->photo_1) }}" width="200" height="120" style="object-fit:cover;" alt="">
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $product->name }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-success rounded-3 fw-semibold">{{ $product->total_quantity ? $product->total_quantity : 0 }}</span>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <a href="/dashboard/products/{{ $product->id }}" class="badge bg-info" style="text-decoration: none !important; color: white !important;">
                                        <i class="ti ti-eye"></i>
                                    </a>
                                </td>
                            </tr>  
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-start mt-3">
                    {{ $products->links() }}
                </div>
              </div>
            </div>
          </div>
    </div>
    
@endsection