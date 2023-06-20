<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $outlets[0]->name }}</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('p_dashboard/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('p_dashboard/css/styles.min.css') }}" />

  {{-- Trix Editor (Description) --}}
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('dashboard.layouts.inc.sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      @include('dashboard.layouts.inc.header')
      <!--  Header End -->
      <div class="container-fluid">
        @yield('container')
       
        @include('dashboard.layouts.inc.footer')
      </div>
    </div>
  </div>

  <body>
  <!-- Konten lainnya -->
  
</body>
  <script src="{{ asset('p_dashboard/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('p_dashboard/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('p_dashboard/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('p_dashboard/js/app.min.js') }}"></script>
  <script src="{{ asset('p_dashboard/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('p_dashboard/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('p_dashboard/js/dashboard.js') }}"></script>
  <script src="https://kit.fontawesome.com/5d3ac04a7f.js" crossorigin="anonymous"></script>
  {{-- Sweet Alerts --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('p_dashboard/js/my.js') }}"></script>
</body>

</html>