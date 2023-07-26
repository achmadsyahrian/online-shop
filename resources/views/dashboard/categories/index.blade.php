@extends('dashboard.layouts.main')
@section('container')
<h1>Product Categories</h1>
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
          <a href="/dashboard/categories/create" class="btn btn-primary"><i class="ti ti-tags"></i> Add New Category</a>
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">#</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Category Name</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Action</h6>
                </th>
              </tr>
            </thead>
            <tbody>
              @php
              $pageNumber = ($categories->currentPage() - 1) * $categories->perPage();
              @endphp
              @foreach ($categories as $category)
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
                  <h6 class="fw-semibold mb-1">{{ $category->name }}</h6>
                </td>
                <td class="border-bottom-0">
                  <a href="/dashboard/categories/{{ $category->id }}/edit" class="badge bg-warning"
                    style="text-decoration: none !important; color: white !important;">
                    <i class="ti ti-edit"></i>
                  </a>
                  <!-- Perbarui elemen form dengan id yang unik untuk setiap kategori -->
                  <form action="/dashboard/categories/{{ $category->id }}" method="POST" class="d-inline"
                    id="formDelete_{{ $category->id }}">
                    @method('delete')
                    @csrf
                    <button type="submit" onclick="event.preventDefault(); deleteData('{{ $category->id }}');"
                      class="badge bg-danger border-0">
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
          {{ $categories->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection