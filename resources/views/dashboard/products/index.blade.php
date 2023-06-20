@extends('dashboard.layouts.main')
@section('container')
    <h1>My Product</h1>
    <hr>
    @if (session()->has('success'))  
      <div class="alert alert-success text-center" role="alert">
          {{ session('success') }}
          <script>
            Swal.fire(
              'Success!',
              '{{ session('success') }}',
              'success'
            )
          </script>
      </div>
    @endif
    <div class="row">
        <div class="col-lg-11 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                <div class="table-responsive">
                <a href="/dashboard/products/create" class="btn btn-primary"><i class="ti ti-shopping-cart-plus"></i> Add New Product</a>
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">#</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Stock</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Price</h6>
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
                                    <h6 class="fw-semibold mb-1">{{ $product->name }}</h6>
                                    @if ($product->category_id == null)  
                                      <span class="fw-normal">Catt: -</span>                          
                                    @else
                                      <span class="fw-normal">Catt: {{ $product->category->name }}</span>                          
                                    @endif
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-primary rounded-3 fw-semibold">{{ $product->stock }}</span>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 fs-4">
                                        Rp. {{ number_format($product->harga, 2, ',', '.') }} {{-- format harga --}}
                                    </h6>
                                </td>
                                <td class="border-bottom-0">
                                    <a href="/dashboard/products/{{ $product->id }}" class="badge bg-info" style="text-decoration: none !important; color: white !important;">
                                        <i class="ti ti-eye"></i>
                                    </a>
                                    <a href="/dashboard/products/{{ $product->id }}/edit" class="badge bg-warning" style="text-decoration: none !important; color: white !important;">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <form action="/dashboard/products/{{ $product->id }}" id="formDelete" method="POST" class="d-inline">
                                      @method('delete')
                                      @csrf
                                      <button type="submit" onclick="event.preventDefault(); deleteData();" class="badge bg-danger border-0">
                                        <i class="ti ti-trash"></i>
                                      </button>
                                    </form>
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