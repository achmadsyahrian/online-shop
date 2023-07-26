<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Online Shop</title>
   <link rel="shortcut icon" type="image/png" href="{{ asset('p_dashboard/images/logos/favicon.png') }}" />
   <link rel="stylesheet" href="{{ asset('p_dashboard/css/styles.min.css') }}" />
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
                           ACHMAD.ID
                        </a>
                        <p class="text-center">Register your account</p>
                        <form action="/register" method="POST">
                           @csrf
                           <div class="mb-3 form-group">
                              <label for="role" class="form-label">Create as</label>
                              <select name="role" id="role" class="form-control">
                                 <option value="user">User</option>
                                 <option value="toko">Toko</option>
                              </select>
                           </div>
                           <div class="mb-3">
                              <label for="username" class="form-label">Username</label>
                              <input type="username" class="form-control @error('username') is-invalid @enderror"
                                 autofocus name="username" id="username" aria-describedby="emailHelp"
                                 value="{{ old('username') }}">
                              @error('username')
                              <div class="invalid-feedback">
                                 {{ $message }}
                              </div>
                              @enderror
                           </div>
                           <div class="mb-3">
                              <label for="name" class="form-label">Name</label>
                              <input type="username" class="form-control @error('name') is-invalid @enderror" autofocus
                                 name="name" id="name" aria-describedby="emailHelp" value="{{ old('name') }}">
                              @error('name')
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
                           <div class="mb-4">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" class="form-control @error('password') is-invalid @enderror"
                                 name="password" id="password">
                              @error('password')
                              <div class="invalid-feedback">
                                 {{ $message }}
                              </div>
                              @enderror
                           </div>
                           <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                           <div class="d-flex align-items-center justify-content-center">
                              <p class="fs-4 mb-0 fw-bold">Already have an account?</p>
                              <a class="text-primary fw-bold ms-2" href="/login">Login here</a>
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