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
      <title>ZEPA Solutions - VNIN TO NIBSS </title>
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
                   @php $title="vnin-to-nibss"; $menu="agency"; @endphp
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
               <!-- Start::page-header -->
               <div class="d-md-flex d-block align-items-center justify-content-between my-2 page-header-breadcrumb">
                  <div>
                     <p class="fw-semibold fs-18 mb-0">VNIN TO NIBSS</p>
                     <span class="fs-semibold text-muted">Submit VNIN TO NIBSS request with required information for assistance with VNIN Issues.</span>
                  </div>
               </div>
               <!-- End::page-header -->
               <!-- Start::row-1 -->
               <div class="row">
                  <div class="col-xxl-12 col-xl-12">
                     <div class="row">
                        <div class="col-xl-12">
                           <div class="row">
                              <div class="col-xxl-6 col-lg-6 col-md-6">
                                 <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                       <div class="d-flex align-items-top justify-content-between">
                                          <div>
                                             <span class="avatar avatar-md avatar-rounded bg-primary-transparent">
                                            <i class="las la-tasks"></i>
                                             </span>
                                          </div>
                                          <div class="flex-fill ms-3">
                                             <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                   <p class="text-muted mb-0">Request</p>
                                                   <h4 class="fw-semibold mt-1">{{ $total_request}}</h4>
                                                </div>
                                                <div id="crm-total-customers"></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xxl-3 col-lg-3 col-md-3">
                                 <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                       <div class="d-flex align-items-top justify-content-between">
                                          <div>
                                             <span class="avatar avatar-md avatar-rounded bg-success-transparent">
                                             <i class="las la-check-double"></i>
                                             </span>
                                          </div>
                                          <div class="flex-fill ms-3">
                                             <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                   <p class="text-muted mb-0">Resolved</p>
                                                   <h4 class="fw-semibold mt-1">{{$resolved}}</h4>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xxl-3 col-lg-3 col-md-3">
                                 <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                       <div class="d-flex align-items-top justify-content-between">
                                          <div>
                                             <span class="avatar avatar-md avatar-rounded bg-danger-transparent">
                                             <i class="las la-list-alt"></i>
                                             </span>
                                          </div>
                                          <div class="flex-fill ms-3">
                                             <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                   <p class="text-muted mb-0">Pending/Rejected</p>
                                                   <h4 class="fw-semibold mt-1">{{ $pending + $rejected}}</h4>
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
                              <div class="col-xl-12">
                                 <div class="card custom-card">
                                    <div class="card-header  justify-content-between">
                                       <div class="card-title">
                                          Support Ticket
                                       </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <center>
                                             <img class="img-fluid" src="{{asset('assets/images/nimc.png')}}" width="30%">
                                          </center>
                                       <small class=" font-italic"><i>Please note that this request will be processed within 2 working days. We appreciate your patience and will keep you updated on the status.</i></small>
                                         @if (session('success'))
                                             <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('success') }}
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
                                            <form name="vnin-to-nibss" method="POST" action="{{route('request-vnin-to-nibss')}}">
                                                @csrf
                                                <div class="row mb-2">

                                                       <div class="col-md-12">
                                                        <p class="mb-2 form-label mt-2"> Request ID</p>
                                                        <input type="text" name="request_id" id="request_id" maxlength="7"  class="form-control text-center" required/>
                                                    </div>
                                                     <div class="col-md-12 mt-2">
                                                        <p class="mb-2 form-label"> BVN No. </p>
                                                        <input type="text" name="bvn_number" id="bvn_number"  class="form-control phone text-center" maxlength="11" required/>
                                                      </div>
                                                     <div class="col-md-12">
                                                        <p class="mb-2 form-label mt-2"> NIN No.</p>
                                                        <input type="text" name="nin_number" id="nin_number"  maxlength="11" class="form-control text-center" required/>
                                                    </div>
                                                     <p class="mt-3 fw-bold"> Service Fee: &#x20A6;{{number_format($ServiceFee),2}}</p>
                                                </div>
                                                <button type="submit" id="vnin-to-nibss" class="btn btn-primary"><i class="las la-share"></i> Submit Request</button>
                                            </form>
                                    </div>
                                 </div>
                              </div>

                           </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="row ">
                              <div class="col-xl-12">
                           <div class="card custom-card ">
                              <div class="card-header justify-content-between">
                                 <div class="card-title">
                                 History
                                 </div>
                              </div>
                              <div class="card-body">
                                  <p>Check the status of your request from the this section. You can track the progress and updates on your request
                                  @if(!$vnin->isEmpty())
                                    @php
                                    $currentPage = $vnin->currentPage(); // Current page number
                                    $perPage = $vnin->perPage(); // Number of items per page
                                    $serialNumber = ($currentPage - 1) * $perPage + 1; // Starting serial number for current page
                                 @endphp
                                 <div class="table-responsive">
                                    <table class="table text-nowrap" style="background:#fafafc !important">
                                       <thead>
                                          <tr class="table-primary">
                                              <th width="5%" scope="col">ID</th>
                                              <th scope="col">Reference No.</th>
                                              <th scope="col">Request ID </th>
                                              <th scope="col" class="text-center">Status</th>
                                              <th scope="col">Query</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @foreach($vnin as $data)
                                          <tr>
                                             <th scope="row">{{ $serialNumber++ }}</th>
                                             <td>{{Str::upper($data->refno)}}</td>
                                             <td>{{$data->requestId}}</td>
                                             <td class="text-center">
                                                @if ($data->status == 'resolved')
                                                <span class="badge bg-outline-success">{{ Str::upper($data->status)}}</span>
                                                @elseif ($data->status == 'rejected')
                                                <span class="badge bg-outline-danger">{{ Str::upper($data->status)}}</span>
                                                @elseif ($data->status == 'pending')
                                                <span class="badge bg-outline-warning">{{ Str::upper($data->status)}}</span>
                                                 @else
                                                  <span class="badge bg-outline-primary">{{ Str::upper($data->status)}}</span>
                                              @endif
                                             </td>
                                              <td class="text-center">
                                               <a type="button" data-bs-toggle="modal" data-id="2" data-reason="{{$data->reason}}" data-bs-target="#reason"> <i class="las la-info-circle bg-light" style="font-size:24px"></i></a>
                                             </td>
                                          </tr>
                                          @endforeach
                                       </tbody>
                                    </table>
                                    <!-- Pagination Links -->
                                   <div class="d-flex justify-content-center">
                                        {{ $vnin->links('vendor.pagination.bootstrap-4') }}
                                   </div>
                                 </div>
                                 @else
                                  <center><img width="65%" src="{{ asset('assets/images/no-transaction.gif')}}" alt=""></center>
                                 <p class="text-center fw-semibold  fs-15">  No Request Available!</p>
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

         <!-----Nodal-->

            <div class="modal fade" id="reason" tabindex="-1" aria-labelledby="reason" data-bs-keyboard="true" aria-hidden="true">
               <!-- Scrollable modal -->
               <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                     <div class="modal-header">
                           <h6 class="modal-title" id="staticBackdropLabel2">Support Query
                           </h6>
                           <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                           <p id="message">No Message Yet.</p>
                     </div>
                  </div>
               </div>
               </div>
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
         $(document).ready(function() {
          //Pay Modal
         $('#reason').on('shown.bs.modal', function(event) {
         var button = $(event.relatedTarget)

         var reason = button.data('reason')
         if(reason != '')
          $("#message").html(reason);
         else
           $("#message").html('No Message Yet.');

    }); });
</script>
<script>
        document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const submitButton = document.getElementById('vnin-to-nibss');

        form.addEventListener('submit', function() {
            submitButton.disabled = true;
            submitButton.innerText = 'Please wait while we process your request...';
        });
      });
     </script>
   </body>
</html>
