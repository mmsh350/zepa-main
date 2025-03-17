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
      <title>ZEPA Solutions - Funding </title>
      <!-- fav icon -->
      <link rel="icon" href="{{ asset('assets/home/images/favicon/favicon.png') }}" type="image/x-icon">
      <!-- Bootstrap Css -->
      <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" >
      <!-- Style Css -->
      <link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet" >
      <!-- Icons Css -->
      <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" >
      <link rel="stylesheet" href="{{ asset('assets/css/custom3.css')}}">
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>
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
                   @php $title="funding"; $menu="wallet"; @endphp
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
                     <p class="fw-semibold fs-18 mb-0">Wallet Funding</p>
                     <span class="fs-semibold text-muted">Select your preferred funding method to deposit funds into your wallet. If you need assistance, please don't hesitate to contact us.</span>
                  </div>
               </div>
               <!-- End::page-header -->
               <!-- Start::row-1 -->
               <div class="row">
                  <div class="col-xxl-12 col-xl-12">
                     <div class="row">
                        <div class="col-xl-12">
                           <div class="row">
                              <div class="col-xxl-4 col-lg-4 col-md-4">
                                 <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                       <div class="d-flex align-items-top justify-content-between">
                                          <div>
                                             <span class="avatar avatar-md avatar-rounded bg-primary-transparent">
                                             <i class="ti ti-wallet fs-16"></i>
                                             </span>
                                          </div>
                                          <div class="flex-fill ms-3">
                                             <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                   <p class="text-muted mb-0">Wallet Balance</p>
                                                   <h4 class="fw-semibold mt-1">&#x20A6;{{number_format($wallet_balance),2}}</h4>
                                                </div>
                                                {{-- <div id="crm-total-customers"><a href="{{route('p2p')}}">P2P</a></div> --}}
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xxl-4 col-lg-4 col-md-4">
                                 <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                       <div class="d-flex align-items-top justify-content-between">
                                          <div>
                                             <span class="avatar avatar-md avatar-rounded bg-info-transparent">
                                             <i class="ti ti-briefcase fs-16"></i>
                                             </span>
                                          </div>
                                          <div class="flex-fill ms-3">
                                             <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                   <p class="text-muted mb-0">Deposited</p>
                                                   <h4 class="fw-semibold mt-1">&#x20A6;{{number_format($deposit),2}}</h4>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xxl-4 col-lg-4 col-md-4">
                                 <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                       <div class="d-flex align-items-top justify-content-between">
                                          <div>
                                             <span class="avatar avatar-md avatar-rounded bg-danger-transparent">
                                             <i class="ri-exchange-funds-line fs-16"></i>
                                             </span>
                                          </div>
                                          <div class="flex-fill ms-3">
                                             <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                   <p class="text-muted mb-0">Spent</p>
                                                   <h4 class="fw-semibold mt-1">&#x20A6;{{number_format($deposit - $wallet_balance),2}}</h4>
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
                                        <small class="fw-semibol mb-2 text-danger">If your funds is not received within 30mins Please
                                          <a href="{{route('support')}}">Contact Support
                                           <i class="bx bx-headphone side-menu__icon"></i>
                                           </a>
                                        </small>
                                        <div class="alert alert-danger alert-dismissible text-center" id="errorMsg" style="display:none;" role="alert">
                                             <small id="message">Processing your request.</small>
                                        </div>
                                        <div class="alert alert-success alert-dismissible text-center" id="successMsg" style="display:none;" role="alert">
                                             <small id="smessage">Processing your request.</small>
                                        </div>


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
                                 More Payment Options
                                 </div>
                              </div>
                              <div class="card-body">


                        <div class="mb-0">
                         <div id="error" style="display:none" class="alert alert-danger alert-dismissible" role="alert"></div>
                          <div class="flex-space flex-wrap align-items-center">
                          <div class="card-wrapper  rounded-3 h-100 w-100 checkbox-checked">
                          <h6 class="sub-title" >1. Online Payment</h6>
                         <span style="text-transform:none">Choose a payment method, enter the funding amount and continue to top up</span>

                        <div class="row mt-3">

                             <div class="col-md-6">
                              <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="ptm44" type="radio" name="radio1" value="moniepoint">
                                <label class="form-check-label mb-0" for="ptm44"><img  width="50%" class="img-fluid" src="{{ asset('assets/images/monify.png') }}" alt="card"></label>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="ptm11"   type="radio" name="radio1" value="paystack">
                                <label class="form-check-label mb-0" for="ptm11"><img class="img-fluid"  width="50%" src="{{ asset('assets/images//paystack.png') }}" alt="card"><br/> Comming soon!</label>
                              </div>
                            </div>

                        </div>

                      <form class="row" name="paymentForm" id="paymentForm">
                      @csrf
                      @method('post')
                      <div class="col-4"  hidden>
                        <input class="form-control"   id="first-name" name="first-name" type="text" value="{{ Auth::user()->first_name; }}" aria-label="First name" required="">
                      </div>
                      <div class="col-4"  hidden>
                        <input class="form-control"  id="last-name" name="last-name" type="text" value="{{ Auth::user()->last_name; }}" aria-label="Last name" required="">
                      </div>
                      <div class="col-4"  hidden>
                        <input class="form-control"   id="email" name="email" type="email" value="{{ Auth::user()->email; }}" required="">
                      </div>
                      <div class="col-4"  hidden>
                        <input class="form-control"   id="phone_number" name="phone_number" type="text" value="{{ Auth::user()-> phone_number; }}" required="">
                      </div>

                      <div class="col-4"  hidden>
                        <input class="form-control" id="desc" type="desc" value="Wallet Top Up" required="">
                      </div>
                      <input type="text" hidden id="response" />
                      <input type="text" hidden id="reference" />
                      <div class="col-6 ">
                        <label class="col-sm-6 col-form-label"  >Top up Amount</label>
                        <input class="form-control border border-dark" onkeypress="return isNumberKey(event)" type="text" id="amount"  name="amount"    value="">
                      </div>
                      <div class="col-8  ">
                      <button class="example-popover btn btn-dark mb-1   mt-3 " id="topup" type="button"><i class="icofont icofont-pay">&nbsp;</i>Top Up</button>
                      </div>
                    </form>
                        </div>
<h6 class="sub-title mt-3" >2. Manual Payment</h6>
                      <span style="text-transform:none">To initiate manual funding, please transfer funds to the account number below. Once complete, kindly fill out our funding request form to finalize the process. For more Information; Contact support on WhatsApp @<a href="{{route('support')}}">{{ env('phoneNumber');}}</a></span>

                                            <div class="d-flex align-items-top  mt-2 flex-wrap">
                                                <div class="me-2">
                                                   <span class="avatar avatar-sm avatar-rounded">
                                                   <img src="{{ asset('assets/images/OPay.jpg')}}" alt="">

                                                   </span>
                                                </div>
                                                <div class="flex-fill">
                                                   <p class="fw-semibold mb-0">{{ env('accountName')}}</p>
                                                   <span class="fs-14 acctno2">{{env('accountNumber')}}</span> <br>
                                                   <span class=" fs-12">{{env('bankName')}} </span>
                                                </div>
                                                <div class="fw-semibold fs-15"><a href="#" class="btn btn-light btn-sm copy-account-number2">Copy</a></div>
                                             </div>
                                             
                                             
                                            <button type="button" class="btn btn-dark mt-3" data-bs-toggle="modal" data-bs-target="#fundingRequestModal">
                                                Request Manual Funding
                                            </button>
                                             
                                               <div class="modal fade" id="fundingRequestModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="fundingRequestModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="fundingRequestModalLabel">Manual Funding Request</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="fundingRequestForm">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="amount" class="form-label">Amount</label>
                                                            <input type="number" class="form-control" id="amount" name="amount" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="type" class="form-label">Type</label>
                                                            <select class="form-control" id="type" name="type" required>
                                                                <option value="transfer">Transfer</option>
                                                                <option value="bank_deposit">Bank Deposit</option>
                                                            </select>
                                                        </div>

                                                         <div class="mb-3">
                                                            <label for="senders_name" class="form-label">Senders Name</label>
                                                            <input type="text" class="form-control" id="senders_name" name="senders_name" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="senders_bank" class="form-label">Bank Name</label>
                                                            <input type="text" class="form-control" id="senders_bank" name="senders_bank" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="date" class="form-label">Transaction Date</label>
                                                            <input type="date" class="form-control" id="date" name="date" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-dark">Submit Request</button>
                                                    </div>
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
     <script src="{{ asset('assets/js/sweetalert.js') }}"></script>
     <script src="{{ asset('assets/js/custom-gates.js')}}"></script>
      <script src="{{ asset('assets/js/config.js') }}"></script>
      <script src="{{ asset('assets/js/logout.js') }}"></script>
       <script>
        window.APP_ENV = {
        MONNIFYCONTRACT: "{{ env('MONNIFYCONTRACT') }}",
        MONNIFYAPI: "{{ env('MONNIFYAPI') }}",
    };
    
      $(document).ready(function () {
    $("#fundingRequestForm").submit(function (event) {
        event.preventDefault();

        $.ajax({
            url: "/funding-request",
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {
                if(response.code == 11){
                alert(response.message);
                }
                else{
                   alert("Funding request submitted successfully!");
                   $("#fundingRequestModal").modal("hide");
                   $("#fundingRequestForm")[0].reset();
                }

            },
            error: function (error) {
                alert("An error occurred. Please try again.");
            }
        });
    });
});
    </script>
   </body>
</html>
