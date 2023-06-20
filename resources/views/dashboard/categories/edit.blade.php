@extends('dashboard.layouts.main')
@section('container')
    <h1>Edit Category</h1>
    <hr>

   <div class="card">
      <div class="card-body">
         <form action="/dashboard/categories/{{ $category->id }}" method="POST">
            @method('put')
            @csrf
            <div class="mb-3">
               <label for="name" class="form-label">Category Name</label>
               <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}">
               @error('name')
                  <div id="name" class="form-text text-danger">{{ $message }}.</div>
               @enderror
            </div>
            <a href="/dashboard/categories" class="btn btn-danger me-2"><i class="ti ti-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-success">Update <i class="ti ti-check"></i></button>
         </form>
      </div>
   </div>
    
@endsection