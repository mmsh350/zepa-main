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
      <title>ZEPA Solutions - Dashboard </title>
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
                   @php $title="dashboard"; $menu="dashboard"; @endphp
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
               <div class="updates-container mt-1 mb-1">
                  <div class="updates-title">Updates</div>
                  <div class="marquee-content">
                     <div class="marquee-inner">
                           @foreach($newsItems as $newsItem)
                           {{ $newsItem->title }} - {{ $newsItem->content }}
                           @if (!$loop->last)
                             &#x2022;
                           @endif
                        @endforeach
                     </div>
                  </div>
               </div>

               <!-- Start::page-header -->
               <div class="d-md-flex d-block align-items-center justify-content-between my-2 page-header-breadcrumb">
                  <div>
                     <p class="fw-semibold fs-18 mb-0">Welcome back, {{ Auth::user()->first_name }} !</p>
                     <span class="fs-semibold text-muted">Centralize your workflow and track all your activities, from start to finish.</span>
                  </div>
                  <div class="alert alert-outline-light d-flex align-items-center shadow-lg d-none d-md-block" role="alert">
                     <div>
                        <small class="fw-semibold mb-0 fs-15 ">Referral Code : {{ Auth::user()->referral_code }}</small>
                     </div>
                  </div>
               </div>
               @if ($note != '')
                   <div class="alert alert-secondary shadow-sm alert-dismissible fade show text-dark">
                      {!! $note->notes !!}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
               </div>

               @endif
               <!-- End::page-header -->
               <!-- Start::row-1 -->
               <div class="row">
                  <div class="col-xxl-12 col-xl-12">
                     <div class="row">
                        <div class="col-xl-12">
                           <div class="row">
                              <div class="col-xxl-4 col-lg-4 col-md-4 ">
                                 <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                       <div class="d-flex align-items-top justify-content-between">
                                          <div>
                                            <a href="{{route('funding') }}">
                                             <span class="avatar avatar-md avatar-rounded bg-primary-transparent">
                                             <i class="ti ti-wallet fs-16"></i>
                                             </span>
                                             </a>
                                          </div>
                                          <div class="flex-fill ms-3">
                                             <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                   <p class="text-muted mb-0">Wallet Balance</p>
                                                   <h4 class="fw-semibold mt-1">&#x20A6;{{number_format($wallet_balance),2}}</h4>
                                                </div>
                                                <div class="text-center ">
                                                                <a href="{{ route('more-services', 'funding') }}">
                                                                    <img class="img-fluid" width="38%"
                                                                        src="{{ asset('assets/images/apps/fund.png') }}">
                                                                </a>
                                                                <p> Fund wallet</p>
                                                            </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xxl-4 col-lg-4 col-md-4 d-none d-md-block">
                                 <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                       <div class="d-flex align-items-top justify-content-between">
                                          <div>
                                            <a href="{{route('claim') }}">
                                             <span class="avatar avatar-md avatar-rounded bg-info-transparent">
                                             <i class="ti ti-briefcase fs-16"></i>
                                             </span>
                                             </a>
                                          </div>
                                          <div class="flex-fill ms-3">
                                             <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                   <p class="text-muted mb-0">Referral Bonus</p>
                                                   <h4 class="fw-semibold mt-1">&#x20A6;{{number_format($bonus_balance),2}}</h4>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xxl-4 col-lg-4 col-md-4 d-none d-md-block">
                                 <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                       <div class="d-flex align-items-top justify-content-between">
                                          <div><a href="{{route('transactions') }}">
                                             <span class="avatar avatar-md avatar-rounded bg-danger-transparent">
                                             <i class="ri-exchange-funds-line fs-16"></i>
                                             </span>
                                          </div></a>
                                          <div class="flex-fill ms-3">
                                             <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                   <p class="text-muted mb-0">Transactions</p>
                                                   <h4 class="fw-semibold mt-1">{{$transaction_count}}</h4>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-4">
                           <div class="row">
    <div class="col-md-3 text-center d-block d-md-none">
    <div class="card custom-card">
        <div class="card-body">
            <div class="row ">
                   <div class="col-6 col-md-3 text-center  mt-2">
                                                     <a href="{{ route('more-services', 'transfer') }}"> <img class="img-fluid"
                                                                width="22%"
                                                                src="{{ asset('assets/images/apps/transfer.png') }}">
                                                            <p>Transfer</p>
                                                        </a>
                                                    </div>
                 <div class="col-6 col-md-3 text-center  mt-2">
                    <a  href="{{route('airtime')}}"><img class="img-fluid" width="22%" src="{{ asset('assets/images/apps/airtime.png') }}">
                    <p>Buy Airtime</p></a>
                </div>
                <div class="col-6 col-md-3 text-center  mt-2">
                     <a href="{{route('more-services',  'data') }}"><img class="img-fluid" width="22%" src="{{ asset('assets/images/apps/data.png') }}">
                    <p>Buy Internet Data</p></a>
                </div>
                <div class="col-6 col-md-3 text-center  mt-2">
                    <a  href="{{route('electricity') }}"> <img class="img-fluid" width="22%" src="{{ asset('assets/images/apps/electric.png') }}">
                    <p>Pay Electric Bills</p></a>
                </div>
                <div class="col-6 col-md-3 text-center  mt-2">
                    <a href="{{route('tv') }}"> <img class="img-fluid" width="22%" src="{{ asset('assets/images/apps/tv.png') }}">
                    <p>Pay TV Subscription</p></a>
                </div>
               
                <div class="col-6 col-md-3 text-center  mt-2">
                    <a href="{{route('education') }}"> <img class="img-fluid" width="22%" src="{{ asset('assets/images/apps/education.png') }}">
                    <p>Educational Pin</p></a>
                </div>
                <div class="col-6 col-md-3 text-center  mt-2">
                    <a href="{{route('more-services',  'verifications') }}"> <img class="img-fluid" width="22%" src="{{ asset('assets/images/apps/identity.png') }}">
                    <p>Verification</p></a>
                </div>
                 <div class="col-6 col-md-3 text-center  mt-2">
                    <a href="{{route('more-services',  'agency') }}"> <img class="img-fluid" width="22%" src="{{ asset('assets/images/apps/modify.png') }}">
                    <p>Agency Services</p></a>
                </div>
            </div>
        </div>
    </div>
</div>

                              <div class="col-xl-12 d-none d-md-block">
                                 <div class="card custom-card">
                                    <div class="card-header  justify-content-between">
                                       <div class="card-title">
                                         Virtual Account Numbers
                                       </div>
                                    </div>
                                    <div class="card-body">
                                       <small class="fw-semibold">Fund your wallet instantly by depositing into the virtual account number</small>
                                       <ul class="list-unstyled crm-top-deals mb-0 mt-3">
                                          @if($virtaul_accounts != null)
                                          @foreach($virtaul_accounts as $data)
                                          <li>
                                             <div class="d-flex align-items-top flex-wrap">
                                                <div class="me-2">
                                                   <span class="avatar avatar-sm avatar-rounded">
                                                   @if ( $data->bankName == 'Wema bank')
                                                   <img src="{{ asset('assets/images/wema.jpg')}}" alt="">
                                                   @elseif($data->bankName == 'Moniepoint Microfinance Bank')
                                                   <img src="{{ asset('assets/images/moniepoint.jpg')}}" alt="">
                                                     @elseif($data->bankName == 'PalmPay')
                                                   <img src="{{ asset('assets/images/palmpay.png')}}" alt="">
                                                   @else
                                                   <img src="{{ asset('assets/images/sterling.png')}}" alt="">
                                                   @endif
                                                   </span>
                                                </div>
                                                <div class="flex-fill">
                                                   <p class="fw-semibold mb-0">{{ $data->accountName}}</p>
                                                   <span class="fs-14 acctno">{{$data->accountNo}}</span> <br>
                                                   <span class=" fs-12">{{$data->bankName}} </span>
                                                </div>
                                                <div class="fw-semibold fs-15"><a href="#" class="btn btn-light btn-sm copy-account-number">Copy</a></div>
                                             </div>
                                          </li>
                                          @endforeach
                                          @endif
                                       </ul>
                                       <hr>
                                       <center>
                                         <a href="{{route('support')}}">
                                         <small class="fw-semibol text-danger">If your funds is not received within 30mins.
                                          Please Contact Support
                                           <i class="bx bx-headphone side-menu__icon" style="font-size:24px"></i>
                                        </small> </a>
                                       </center>
                                    </div>
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="row">
                         <div class="col-xl-12 d-none d-md-block ">
    <div class="card custom-card">
       <div class="card-header justify-content-between">
                                 <div class="card-title">
                                 Our Services
                                 </div>
                              </div>
        <div class="card-body">
            <div class="row ">
                <div class="col-6 col-md-3 text-center  mt-2">
                                                       <a href="{{ route('more-services', 'transfer') }}"> <img class="img-fluid"
                                                                width="22%"
                                                                src="{{ asset('assets/images/apps/transfer.png') }}">
                                                            <p>Transfer</p>
                                                        </a>
                                                    </div>
                <div class="col-6 col-md-3 text-center  mt-2">
                    <a  href="{{route('airtime')}}"><img class="img-fluid" width="22%" src="{{ asset('assets/images/apps/airtime.png') }}">
                    <p>Buy Airtime</p></a>
                </div>
                <div class="col-6 col-md-3 text-center  mt-2">
                     <a href="{{route('more-services',  'data') }}"><img class="img-fluid" width="22%" src="{{ asset('assets/images/apps/data.png') }}">
                    <p>Buy Internet Data</p></a>
                </div>
                <div class="col-6 col-md-3 text-center  mt-2">
                    <a  href="{{route('electricity') }}"> <img class="img-fluid" width="22%" src="{{ asset('assets/images/apps/electric.png') }}">
                    <p>Pay Electric Bills</p></a>
                </div>
                <div class="col-6 col-md-3 text-center  mt-2">
                    <a href="{{route('tv') }}"> <img class="img-fluid" width="22%" src="{{ asset('assets/images/apps/tv.png') }}">
                    <p>Pay TV Subscription</p></a>
                </div>
               
                <div class="col-6 col-md-3 text-center  mt-2">
                    <a href="{{route('education') }}"> <img class="img-fluid" width="22%" src="{{ asset('assets/images/apps/education.png') }}">
                    <p>Educational Pin</p></a>
                </div>
                <div class="col-6 col-md-3 text-center  mt-2">
                    <a href="{{route('more-services',  'verifications') }}"> <img class="img-fluid" width="22%" src="{{ asset('assets/images/apps/identity.png') }}">
                    <p>Verification</p></a>
                </div>
                 <div class="col-6 col-md-3 text-center  mt-2">
                    <a href="{{route('more-services',  'agency') }}"> <img class="img-fluid" width="22%" src="{{ asset('assets/images/apps/modify.png') }}">
                    <p>Agency Services</p></a>
                </div>
            </div>
        </div>
    </div>
</div>

                              <div class="col-xl-12 d-none d-md-block">
                           <div class="card custom-card ">
                              <div class="card-header justify-content-between">
                                 <div class="card-title">
                                 Recent Transactions
                                 </div>
                              </div>
                              <div class="card-body" style="background:#fafafc;">
                                 @if(!$transactions->isEmpty())
                                    @php
                                    $currentPage = $transactions->currentPage(); // Current page number
                                    $perPage = $transactions->perPage(); // Number of items per page
                                    $serialNumber = ($currentPage - 1) * $perPage + 1; // Starting serial number for current page
                                 @endphp
                                 <div class="table-responsive">
                                    <table class="table text-nowrap" style="background:#fafafc !important">
                                       <thead>
                                          <tr class="table-primary">
                                             <th width="5%" scope="col">ID</th>
                                             <th scope="col">Date</th>
                                             <th scope="col">Type</th>
                                             <th scope="col">Status</th>
                                             <th scope="col">Description</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @php $i = 1; @endphp
                                          @foreach($transactions as $data)
                                          <tr>
                                             <th scope="row">{{ $serialNumber++ }}</th>
                                             <td>{{date("F j, Y", strtotime($data->created_at) );}}</td>
                                             <td>{{ $data->service_type}}</td>
                                             <td>
                                                @if ($data->status == 'Approved')
                                                <span class="badge bg-outline-success">{{ $data->status}}</span>
                                                @elseif ($data->status == 'Rejected')
                                                <span class="badge bg-outline-danger">{{ $data->status}}</span>
                                                @elseif ($data->status == 'Pending')
                                                <span class="badge bg-outline-warning">{{ $data->status}}</span>
                                                @endif
                                             </td>
                                             <td>{{ $data->service_description}}</td>
                                          </tr>
                                          @php $i++ @endphp
                                          @endforeach
                                       </tbody>
                                    </table>
                                     <!-- Pagination Links -->
                                   <div class="d-flex justify-content-center">
                                        {{ $transactions->links('vendor.pagination.bootstrap-4') }}
                                   </div>
                                 </div>
                                 @else
                                  <center><img width="65%" src="{{ asset('assets/images/no-transaction.gif')}}" alt=""></center>
                                 <p class="text-center fw-semibold  fs-15"> No Available Transaction </p>
                                 @endif
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
      <!-- Custom JS -->
      <script src="{{ asset('assets/js/config.js') }}"></script>
      <script src="{{ asset('assets/js/logout.js') }}"></script>
      <script>

               const marqueeInner = document.querySelector('.marquee-inner');

               marqueeInner.addEventListener('mouseover', () => {
                  marqueeInner.style.animationPlayState = 'paused';
               });

               marqueeInner.addEventListener('mouseout', () => {
                  marqueeInner.style.animationPlayState = 'running';
               });

      </script>
   </body>
</html>
