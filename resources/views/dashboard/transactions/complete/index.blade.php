@extends('dashboard.layouts.main')
@section('container')

<h1>Completed Transaction</h1>
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
               <table class="table text-nowrap mb-0 align-middle">
                  <thead class="text-dark fs-4">
                     <tr>
                        <th class="border-bottom-0">
                           <h6 class="fw-semibold mb-0">#</h6>
                        </th>
                        <th class="border-bottom-0">
                           <h6 class="fw-semibold mb-0">Tanggal Pembelian</h6>
                        </th>
                        <th class="border-bottom-0">
                           <h6 class="fw-semibold mb-0">Total Bayar</h6>
                        </th>
                        <th class="border-bottom-0">
                           <h6 class="fw-semibold mb-0">Metode Pembayaran</h6>
                        </th>
                        <th class="border-bottom-0">
                           <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                     {{-- @php
                     $pageNumber = ($categories->currentPage() - 1) * $categories->perPage();
                     @endphp --}}
                     @foreach ($transactions as $transaction)
                     {{-- @php
                     $pageNumber++;
                     @endphp --}}
                     <tr>
                        <td class="border-bottom-0">
                           <h6 class="fw-semibold mb-0">
                              1
                           </h6>
                        </td>
                        <td class="border-bottom-0">
                           <div class="d-flex align-items-center gap-2">
                              <span class="badge bg-primary rounded-3 fw-semibold">
                                 {{ $transaction->payment_date }}
                              </span>
                           </div>
                        </td>
                        <td class="border-bottom-0">
                           <h6 class="fw-semibold mb-1">Rp. {{ number_format($transaction->grand_total, 2, ',', '.') }}
                           </h6>
                        </td>
                        <td class="border-bottom-0">
                           <div class="d-flex align-items-center gap-2">
                              <span class="badge bg-warning rounded-3 fw-semibold">
                                 @if ($transaction->payment_method == "e_wallet")
                                 <i class="ti ti-wallet"></i> E - Wallet
                                 @else
                                 <i class="ti ti-cash"></i> Bank Transfer
                                 @endif
                              </span>
                           </div>
                        </td>
                        <td class="border-bottom-0">
                           <a href="/dashboard/transaction/completed/{{ $transaction->id }}" class="badge bg-info"
                              style="text-decoration: none !important; color: white !important;">
                              <i class="ti ti-eye"></i>
                           </a>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            {{-- <div class="d-flex justify-content-start mt-3">
               {{ $categories->links() }}
            </div> --}}
         </div>
      </div>
   </div>
</div>

@endsection