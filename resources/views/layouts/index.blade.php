<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta Data -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Easy Verifications for your Business"/>
    <meta name="keywords" content="NIMC, BVN, ZEPA, Verification, Airtime,Bills, Identity">
    <meta name="author" content="Zepa Developers">
    <title> @yield('title')</title>

     <!-- fav icon -->
    <link rel="icon" href="{{ asset('assets/home/images/favicon/favicon.ico') }}" type="image/x-icon">

    <!-- bootstarp css file -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/bootstrap.min.css')}}">

    <!-- aos.css file -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/aos.css')}}">

    <!-- fancybox css file -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/jquery.fancybox.min.css')}}">

    <!-- owl carousel css file -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.theme.default.min.css')}}">

    <!--  toasts file     -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/toastr.min.css')}}">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <!-- main css file -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/style.css')}}">
    @yield('page-css')
</head>

<body class="home">

  <!-- start preLoader -->
  <div id="preloader">
      <span class="loader"></span>
  </div>
  <!-- end preLoader -->

  <!-- start scroll to top button -->
  <div id="progress">
    <span id="progress-value"><i class="bi bi-arrow-up-short"></i></span>
  </div>

  <header class="header">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand" href="{{ env('APP_URL')}}">
        <img src="{{ asset('assets/home/images/logo/logo.png')}}" alt="Logo" width="40" height="30" style="max-width: 100%;">
      </a>

      <!-- Navbar Toggle Button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="bi bi-list" id="menu"></i>
      </button>

      <!-- Navbar Content -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <!-- Navigation Links -->
          <li class="nav-item">
            <a class="nav-link" href="{{ url('') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/')}}#api" onclick="return confirm('Coming Soon!')">API Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/pricing') }}">Pricing</a>
          </li>
          </ul>
          <div class="d-flex ms-auto">
            <a class="btn" href="{{ route('login') }}">Join Now</a>
            <button id="mode-toggle" class="btn-light-mode switch-button"><i id="mode-icon"
                class="bi bi-moon-fill"></i></button>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <!-- ======= end Header ======= -->
@yield('content')

<!-- ============== Start Footer section ========== -->
  <hr>

  <!-- Footer Bottom -->
  <div class="container-sm">
  <div class="copyrights">
    <div class="container-sm">
      <div class="row">
        <div class="col-12 col-md-6 text-center text-md-start">
          <p class="creadits">&copy; 2024 Created by: <a href="{{ url('/')}}">Zepa solutions</a></p>
        </div>
        <div class="col-12 col-md-6 text-center text-md-end">
          <a href="terms-of-use.html">Terms of Use</a> | <a href="privacy-policy.html">Privacy Policy</a>
        </div>
      </div>
    </div>
  </div>
</div>

  <!--  JQuery file     -->
  <script src="{{ asset('assets/home/js/jquery-3.6.1.min.js') }}"></script>

  <!-- bootstrap min js -->
  <script src="{{ asset('assets/home/js/bootstrap.min.js') }}"></script>

  <!--  toasts file     -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <!--  owl carousel    -->
  <script src="{{ asset('assets/home/js/owl.carousel.min.js') }}"></script>

  <!-- aos file    -->
  <script src="{{ asset('assets/home/js/aos.js') }}"></script>

  <!-- gsap file    -->
  <script src="{{ asset('assets/home/js/gsap.min.js') }}"></script>

  <!--  counter     -->
  <script src="{{ asset('assets/home/js/jquery.counterup.min.js') }}"></script>
  <script src="{{ asset('assets/home/js/jquery.waypoints.js') }}"></script>

  <!-- particles js file  -->
  <script src="{{ asset('assets/home/js/particles.min.js') }}"></script>

  <!-- jquery isotope file -->
  <script src="{{ asset('assets/home/js/isotope.min.js') }}"></script>

  <!-- jquery fancybox file -->
  <script src="{{ asset('assets/home/js/jquery.fancybox.min.js') }}"></script>

  <!--  main js file  -->
  <script src="{{ asset('assets/home/js/main.js') }}"></script>

  @yield('page-js')
</body>
</html>
