<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>    
    <!-- Meta Data -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Easy Verifications for your Business"/>
    <meta name="keywords" content="NIMC, BVN, ZEPA, Verification, Airtime,Bills, Identity">
    <meta name="author" content="Zepa Developers">
    <title>ZEPA Solutions - Verify Email</title> 
    
     <!-- fav icon -->
    <link rel="icon" href="{{ asset('assets/home/images/favicon/favicon.png') }}" type="image/x-icon">

    <!-- Main Theme Js -->
    <script src="{{ asset('assets/js/authentication-main.js')}}"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" >

    <!-- Style Css -->
    <link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" >

    <!-- Custom Css -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" >
</head>
<body>  
<!-- start preLoader -->
  <div id="preloader">
	 <span class="loader"></span>
  </div>
  <!-- end preLoader -->
        <div class="container-lg">
            <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                    <div class="card custom-card">
                        <div class="card-body p-5">
                             <div class="my-2 d-flex justify-content-center">
                         <a href="../" >
                        <img src="{{ asset('assets/images/brand-logos/logo.png')}}" alt="logo" class="desktop-logo" style="width:60px; height:55px">
                        <img src="{{ asset('assets/images/brand-logos/logo-dark.jpg')}}" alt="logo" class="desktop-dark"  style="width:60px; height:55px">
                    </a>  </div>
                            <p class="mb-4 text-muted op-7 fw-normal text-center">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.</p>
                            <div class="row gy-3">
                               <!-- Session Status -->
                                 @if(session('status') == 'verification-link-sent')
                                    <div class="alert alert-success alert-dismissible shadow-sm" role="alert">
                                        A new verification link has been sent to the email address you provided during registration.
                                    </div>
                                @endif
                            <!-- End Session Status --> 
                                <div class="col-lg-12 text-center"> 
                                    <form method="POST" action="{{ route('verification.send') }}">
                                     @csrf
                                     <div class="pb-2">
                                        <button type="submit" class="btn btn-primary shadow btn-wave">Resend Verification Email</button>
                                     </div>
                                    </form>
                                 
                                    <form method="POST" action="{{ route('logout') }}">
                                     @csrf 
                                     <div>
                                       <button type="submit" class="btn btn-outline-danger btn-wave waves-effect waves-light">Logout</button>
                                     </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Jquery-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
</body>

</html>