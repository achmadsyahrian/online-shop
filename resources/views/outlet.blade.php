<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Online Shop</title>
   <link rel="shortcut icon" type="image/png" href="{{ asset('p_dashboard/images/logos/favicon.png') }}" />
   <link rel="stylesheet" href="{{ asset('p_dashboard/css/styles.min.css') }}" />
   {{-- Trix Editor (Description) --}}
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
   
</head>

<body>
   <!--  Body Wrapper -->
   <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">
      <div
         class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
         <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
               <div class="col-md-8 col-lg-6 col-xxl-3">
                  <div class="card mb-0">
                     <div class="card-body">
                        <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100 h3">
                           ONLINE SHOP
                        </a>
                        <p class="text-center">Create your outlet</p>
                        <form action="/create-outlet" method="POST">
                           @csrf
                           <div class="mb-3">
                              <label for="name" class="form-label">Name</label>
                              <input type="name" class="form-control @error('name') is-invalid @enderror"
                                 autofocus name="name" id="name" aria-describedby="emailHelp"
                                 value="{{ old('name') }}">
                              @error('name')
                              <div class="invalid-feedback">
                                 {{ $message }}
                              </div>
                              @enderror
                           </div>
                           <div class="mb-3">
                              <label for="address" class="form-label">Address</label>
                              <input type="text" class="form-control @error('address') is-invalid @enderror" autofocus
                                 name="address" id="address" aria-describedby="emailHelp" value="{{ old('address') }}">
                              @error('address')
                              <div class="invalid-feedback">
                                 {{ $message }}
                              </div>
                              @enderror
                           </div>
                           <div class="mb-3">
                              <label for="phone" class="form-label">Telephone</label>
                              <div class="input-group">
                                 <span class="input-group-text">+62</span>
                                 <input type="text" class="form-control @error('phone') is-invalid @enderror" autofocus
                                    name="phone" id="phone" aria-describedby="emailHelp" value="{{ old('phone') }}">
                              </div>
                              <p class="fs-2">Exm. 81234567890</p>
                              @error('phone')
                                 <p class="text-danger fs-2">
                                    {{ $message }}
                                 </p>
                              @enderror
                           </div>
                           <div class="mb-3">
                              <label for="description" class="form-label">Description</label>
                              <input id="description" type="hidden" name="description" value="{{ old('description') }}">
                              <trix-editor input="description" class="@error('description') border-danger @enderror"></trix-editor>
                              @error('description')
                                 <div id="name" class="form-text text-danger">{{ $message }}.</div>
                              @enderror
                           </div>
                           <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                           <div class="d-flex align-items-center justify-content-center">
                              <a class="text-primary fw-bold ms-2" href="/">Back to Home</a>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script src="{{ asset('p_dashboard/libs/jquery/dist/jquery.min.js') }}"></script>
   <script src="{{ asset('p_dashboard/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>