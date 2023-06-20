@extends('dashboard.layouts.main')
@section('container')
    <h1>Add New Product</h1>
    <hr>

   <div class="card">
      <div class="card-body">
         <form action="/dashboard/products" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
               <label for="name" class="form-label">Product Name</label>
               <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
               @error('name')
                  <div id="name" class="form-text text-danger">{{ $message }}.</div>
               @enderror
            </div>
            <div class="mb-3">
               <label for="price" class="form-label">Cattegory</label>
               <select class="form-select" name="category_id" aria-label="Default select example">
                  @foreach ($categories as $category)
                     @if (old('category_id') == $category->id)
                         <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                     @endif
                     <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
               </select>
            </div>
            <div class="mb-3">
               <label for="price" class="form-label">Outlet</label>
               <select class="form-select" name="outlet_id" aria-label="Default select example">
                  @foreach ($outlets as $outlet)
                     @if (old('outlet_id') == $outlet->id)
                        <option value="{{ $outlet->id }}" selected>{{ $outlet->name }}</option>
                     @endif
                     <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                  @endforeach
               </select>
            </div>
            <div class="mb-3">
               <label for="price" class="form-label">Price</label>
               <div class="input-group mb-3">
                  <span class="input-group-text">Rp.</span>
                  <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
                  <span class="input-group-text">,00</span>                  
               </div>
               @error('harga')
                  <div id="price" class="form-text text-danger">{{ $message }}</div>
               @enderror
                  <div id="emailHelp" class="form-text">Exm. Rp. 50000 ,00</div>
            </div>
            <div class="mb-3">
               <label for="stock" class="form-label">Stock</label>
               <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock') }}">
               @error('stock')
                  <div id="name" class="form-text text-danger">{{ $message }}.</div>
               @enderror
            </div>
            <div class="container">
               <div class="row ">
                  <div class="col-md-4 ">
                     <label for="photo_1" class="form-label">Image 1</label>
                     <div class="mb-3">
                        <img class="img-preview card-img-top rounded mb-3" id="imgPreview1" src="">
                        <input type="file" class="form-control @error('photo_1') is-invalid @enderror" id="photo_1" name="photo_1" onchange="previewImage('photo_1', 'imgPreview1');">
                        @error('photo_1')
                           <div id="name" class="form-text text-danger">{{ $message }}.</div>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-4">
                     <label for="photo_2" class="form-label">Image 2</label>
                     <div class="mb-3">
                        <img class="img-preview card-img-top rounded mb-3" id="imgPreview2" src="">
                        <input type="file" class="form-control @error('imag2') is-invalid @enderror" id="photo_2" name="photo_2" onchange="previewImage('photo_2', 'imgPreview2');">
                        @error('photo_2')
                           <div id="name" class="form-text text-danger">{{ $message }}.</div>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-4">
                     <label for="photo_3" class="form-label">Image 3</label>
                     <div class="mb-3">
                        <img class="img-preview card-img-top rounded mb-3" id="imgPreview3" src="">
                        <input type="file" class="form-control photo_3" id="photo_3" name="photo_3" onchange="previewImage('photo_3', 'imgPreview3');">
                        @error('photo_3')
                           <div id="name" class="form-text text-danger">{{ $message }}.</div>
                        @enderror
                     </div>
                  </div>
               </div>
            </div>
            <div class="mb-3">
               <label for="description" class="form-label">Description</label>
               <input id="description" type="hidden" name="description" value="{{ old('description') }}">
               <trix-editor input="description" class="@error('description') border-danger @enderror"></trix-editor>
               @error('description')
                  <div id="name" class="form-text text-danger">{{ $message }}.</div>
               @enderror
            </div>

            <a href="/dashboard/products" class="btn btn-danger me-2"><i class="ti ti-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-success">Create <i class="ti ti-check"></i></button>
         </form>
      </div>
   </div>


   <script>
      function previewImage(imageId, imgPreviewId) {
         const image = document.getElementById(imageId);
         const imgPreview = document.getElementById(imgPreviewId);
         
         if (image.files && image.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
               imgPreview.src = e.target.result;
               imgPreview.style.width = '100%';
               imgPreview.style.height = '300px';
               imgPreview.style.objectFit = 'cover';

            }
            
            reader.readAsDataURL(image.files[0]);
         }
      }

   </script>
    
@endsection