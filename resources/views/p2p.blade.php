<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">
   <head>
      <!-- Meta Data -->
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Easy Verifications for your Business"/>
      <meta name="keywords" content="NIMC, BVN, ZEPA, Verification, Airtime,Bills, Identity">
      <meta name="author" content="Zepa Developers">
      <title>ZEPA Solutions - Transfer Funds P2P </title>
      <!-- fav icon -->
      <link rel="icon" href="{{ asset('assets/home/images/favicon/favicon.png') }}" type="image/x-icon">
      <!-- Bootstrap Css -->
      <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" >
      <!-- Style Css -->
      <link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet" >
      <!-- Icons Css -->
      <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" >
      <link rel="stylesheet" href="{{ asset('assets/css/custom3.css')}}">
   </head>
   <body>
      <!-- start preLoader -->
      <div id="preloader">
         <span class="loader"></span>
      </div>
      <!-- end preLoader -->
      <!-- Loader -->
      <div class="page">
         <!-- app-header -->
         <header class="app-header">
            <!-- Start::main-header-container -->
            <div class="main-header-container container-fluid">
               <!-- Start::header-content-left -->
               <div class="header-content-left">
                  <!-- Start::header-element -->
                  <div class="header-element">
                     <div class="horizontal-logo">
                        <a href="{{route('dashboard')}}" class="header-logo">
                        <img src="{{ asset('assets/images/brand-logos/logo.png')}}" alt="logo" class="desktop-logo">
                        <img src="{{ asset('assets/images/brand-logos/logo.png')}}" alt="logo" class="toggle-logo">
                        <img src="{{ asset('assets/images/brand-logos/logo.png')}}" alt="logo" class="toggle-dark">
                        <img src="{{ asset('assets/images/brand-logos/logo.png')}}" alt="logo" class="desktop-white">
                        <img src="{{ asset('assets/images/brand-logos/logo.png')}}" alt="logo" class="toggle-white">
                        </a>
                     </div>
                  </div>
                  <!-- End::header-element -->
                  <!-- Start::header-element -->
                  <div class="header-element">
                     <!-- Start::header-link -->
                     <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle" data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                     <!-- End::header-link -->
                  </div>
                  <!-- End::header-element -->
               </div>
               <!-- End::header-content-left -->
               <!-- Start::header-content-right -->
               <div class="header-content-right">
                  <!-- End::header-element -->
                  <!-- Start::header-element -->
                  <div class="header-element notifications-dropdown">
                     <!-- Start::header-link|dropdown-toggle -->
                     <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
                     <i class="bx bx-bell header-link-icon"></i>
                     <span class="badge bg-danger rounded-pill header-icon-badge pulse pulse-secondary" id="notification-icon-badge">{{$notifycount}}</span>
                     </a>
                     <!-- End::header-link|dropdown-toggle -->
                     <!-- Start::main-header-dropdown -->
                     <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                        <div class="p-3">
                           <div class="d-flex align-items-center justify-content-between">
                              <p class="mb-0 fs-17 fw-semibold">Notifications</p>
                              <span class="badge bg-danger-transparent" id="notifiation-data">{{$notifycount}} Unread</span>
                           </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <ul class="list-unstyled mb-0" id="header-notification-scroll">
                           @if($notifycount != 0)  
                           <audio src="{{ asset('assets/audio/notification.mp3')}}" autoplay="autoplay" ></audio>
                           @endif
                           @if($notifications->count() != 0)                   
                           @foreach($notifications as $data)
                           <li class="dropdown-item">
                              <div class="d-flex align-items-start">
                                 <div class="pe-2">
                                    @if($data->message_title == 'Account Has Been Verified')
                                    <span class="avatar avatar-md bg-primary-transparent avatar-rounded"><i class="ti ti-user-check fs-18"></i></span>
                                    @else
                                    <span class="avatar avatar-md bg-primary-transparent avatar-rounded"><i class="ti ti-bell fs-18"></i></span>
                                    @endif
                                 </div>
                                 <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                    <div>
                                       <p class="mb-0 fw-semibold">{{$data->message_title}}</p>
                                       <span class="text-muted fw-normal fs-12 header-notification-text">{{$data->messages}}</span>
                                    </div>
                                    <div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           @endforeach
                           @else
                           <div class="p-5 empty-item1">
                              <div class="text-center">
                                 <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">
                                 <i class="ri-notification-off-line fs-2"></i>
                                 </span>
                                 <h6 class="fw-semibold mt-3">No New Notifications</h6>
                              </div>
                           </div>
                           @endif
                        </ul>
                        @if($notifycount != 0) 
                        <div class="p-3 empty-header-item1 border-top">
                           <div class="d-grid">
                              <a  id="read" href="#" class="btn btn-primary">Mark as Read</a>
                              <p style="display:none" id="done" class="text-danger text-center">Marked Read</p>
                           </div>
                        </div>
                        @endif
                     </div>
                     <!-- End::main-header-dropdown -->
                  </div>
                  <!-- End::header-element -->
                  <!-- Start::header-element -->
                  @include('components.header')
                  <!-- End::header-element -->
               </div>
               <!-- End::header-content-right -->
            </div>
            <!-- End::main-header-container -->
         </header>
         <!-- /app-header -->
         <!-- Start::app-sidebar -->
         <aside class="app-sidebar sticky" id="sidebar">
            <!-- Start::main-sidebar-header -->
            <div class="main-sidebar-header">
               <a href="{{ route('dashboard') }}" class="header-logo">
               <img src="{{ asset('assets/images/brand-logos/logo.png')}}" alt="logo" class="desktop-logo">
               <img src="{{ asset('assets/images/brand-logos/logo.png')}}" alt="logo" class="desktop-dark">
               <img src="{{ asset('assets/images/brand-logos/logo.png')}}" alt="logo" class="toggle-dark">
               </a>
            </div>
            <!-- End::main-sidebar-header -->
            <!-- Start::main-sidebar -->
            <div class="main-sidebar" id="sidebar-scroll">
               <!-- Start::nav -->
               <nav class="main-menu-container nav nav-pills flex-column sub-open">
                  <div class="slide-left" id="slide-left">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                     </svg>
                  </div>
                  @php $title="p2p"; $menu="wallet"; @endphp
                  @include('components.sidebar')
                  <div class="slide-right" id="slide-right">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                     </svg>
                  </div>
               </nav>
               <!-- End::nav -->
            </div>
            <!-- End::main-sidebar -->
         </aside>
         <!-- End::app-sidebar -->
         <!-- Start::app-content -->
         <div class="main-content app-content">
            <div class="container-fluid">
               
               <!-- End::page-header -->
               <!-- Start::row-1 -->
               <div class="row mt-2">
                  <div class="col-xxl-12 col-xl-12">
                     <div class="row">
                        <div class="col-xl-12">
                           <div class="row">
                                 <div class="card custom-card">
                                      <div class="card-header  justify-content-between">
                                       <div class="card-title">
                                            <i class="ti ti-wallet fs-16 side-menu__icon"></i> Wallet to Wallet Transfer (P2P)  
                                       </div>
                                    </div>
                                    <div class="card-body  mt-3">
                                        @if (session('success'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                   {!! session('success') !!}
                                                </div>
                                          @endif
                                         
                                             @if (session('error'))
                                             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ session('error') }}
                                             </div>
                                             @endif
                                          

                                         @if ($errors->any())
                                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                             <ul>
                                                @foreach ($errors->all() as $error)
                                                      <li>{{ $error }}</li>
                                                @endforeach
                                             </ul>
                                          </div>
                                    @endif
                                         <div class="row text-center">
                                           <div class="col-xl-7">
                                             <div class="alert alert-light shadow-sm">
                                          <center><svg class="d-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36" fill="currentColor"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11 11V17H13V11H11ZM11 7V9H13V7H11Z"></path></svg>
                                          <p> To initiate a wallet-to-wallet transfer, please enter the recipient's wallet ID. You can find your own wallet ID below for reference:</p>
                                         <p> Your Wallet ID:</p> 
                                         <h2>{{ Auth::user()->phone_number }}</h2>
                                          Enter the recipient's wallet ID carefully to ensure a successful transfer.
                                          </center> 
                                          
                                          <p class="mt-5 text-danger"> If you encounter any issues with the transfer, please don't hesitate to reach out to our Customer Care team for assistance. We're here to help</p>
                                        <a href="{{route('support')}}"><i class="las la-headset text-primary" style="font-size:64px"></i> 
                                        <p>Customer Support</p></a>
                                       </div>
                                       
                                       </div>

                                         <div class="col-md-5">
                                           <div class="card-body rounded" style="background:#fff; border: 1px solid #9b9b9b;">
                                            
                                      <img class="img-fluid" src="{{ asset('assets/images/transfer-img.jpg')}}" alt="">
                                   
                                            <form id="transfer" name="transfer" action="{{route('transfer-funds')}}" method="POST">
                                                @csrf
                                                <div class="mb-3 row">
                                                    <div class="col-md-12">
                                                        <p class="mb-2 mt-3 form-label">Wallet ID</p>
                                                        <input type="text" id="Wallet_ID" name="Wallet_ID" value="" class="form-control text-center" maxlength="11" required/>
                                                       <p id="reciever"></p>
                                                      </div>

                                                      <div class="col-md-12 mb-3 ">
                                                        <p class="mb-2 form-label">Amount to transfer</p>
                                                        <input type="text" id="Amount" name="Amount" value="" class="form-control text-center" maxlength="5" required/>
                                                    </div>
                                                </div>
                                                <button type="submit" id="transfer" class="btn btn-primary"><i class="las la-exchange-alt"></i> Transfer</button>
                                            </form>
                                              
                                         </div>

                                          
                                         </div>
                                    </div>
                                 </div>
                               
                             
                           </div>
                        </div>
                       
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- End::row-1 -->
      </div>
      </div>
      <!-- End::app-content -->
      <!-- Footer Start -->
      <footer class="footer mt-auto py-3 bg-white text-center">
         @include('components.footer')
      </footer>
      <!-- Footer End -->
      </div>
      <!-- Scroll To Top -->
      <div class="scrollToTop">
         <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
      </div>
      <div id="responsive-overlay"></div>
      <!-- Scroll To Top -->
      <script src="{{ asset('assets/kyc/js/jquery-3.7.1.min.js')}}"></script>
      <!-- Popper JS -->
      <script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js')}}"></script>
      <!-- Bootstrap JS -->
      <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <!-- Defaultmenu JS -->
      <script src="{{ asset('assets/js/defaultmenu.min.js')}}"></script>
      <!-- Sticky JS -->
      <script src="{{ asset('assets/js/sticky.js')}}"></script>
      <script src="{{ asset('assets/js/wallet.js') }}"></script>
      <script src="{{ asset('assets/js/config.js') }}"></script>
      <script src="{{ asset('assets/js/logout.js') }}"></script>
   </body>
</html>
