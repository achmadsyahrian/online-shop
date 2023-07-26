<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Onine Shop</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/themify-icons/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/nice-select/nice-select.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset(('vendors/owl-carousel/owl.carousel.min.css')) }}">

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  {{-- Trix Editor (Description) --}}
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
  
</head>
<body>
  <!--================ Start Header Menu Area =================-->
	@include('layouts.inc.header')
	<!--================ End Header Menu Area =================-->

  <main class="site-main">
    @yield('container')
  </main>


  <!--================ Start footer Area  =================-->	
	@include('layouts.inc.footer')
	<!--================ End footer Area  =================-->



  <script src="{{ asset('vendors/jquery/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
  {{-- <script src="{{ asset('vendors/skrollr.min.js') }}"></script> --}}
  <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('vendors/nice-select/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('vendors/jquery.ajaxchimp.min.js') }}"></script>
  <script src="{{ asset('vendors/mail-script.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>

  {{-- Font Awesome --}}
  <script src="https://kit.fontawesome.com/5d3ac04a7f.js" crossorigin="anonymous"></script>
  
</body>
</html>