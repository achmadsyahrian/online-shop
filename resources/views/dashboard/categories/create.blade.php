@extends('dashboard.layouts.main')
@section('container')
    <h1>Add New Categories</h1>
    <hr>

   <div class="card">
      <div class="card-body">
         <form action="/dashboard/categories" method="POST">
            @csrf
            <div class="mb-3">
               <label for="name" class="form-label">Category Name</label>
               <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
               @error('name')
                  <div id="name" class="form-text text-danger">{{ $message }}.</div>
               @enderror
            </div>
            <a href="/dashboard/categories" class="btn btn-danger me-2"><i class="ti ti-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-success">Create <i class="ti ti-check"></i></button>
         </form>
      </div>
   </div>
    
@endsection