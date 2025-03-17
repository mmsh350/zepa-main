@extends('layouts.dashboard')
@section('title', 'BVN Verification V2 ')
@section('content')

    <!------App Header ----->
    @include('components.app-header')
    <!-- Start::app-sidebar -->
      @php
          $title = 'BVN2';
        $menu = 'Identity';
    @endphp

    @include('components.app-sidebar')


    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Start::row-1 -->
            <div class="row mt-4">
                <div class="col-xxl-12 col-xl-12">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card custom-card">
                                        <div class="card-header justify-content-between">
                                            <div class="card-title">
                                                <i class="bx bx-fingerprint side-menu__icon"></i> Verify BVN V2
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="alert alert-danger shadow-sm">
                                                <center><svg class="d-block"
                                                         xmlns="http://www.w3.org/2000/svg"
                                                         viewBox="0 0 24 24"
                                                         width="36"
                                                         height="36"
                                                         fill="currentColor">
                                                        <path
                                                              d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11 11V17H13V11H11ZM11 7V9H13V7H11Z">
                                                        </path>
                                                    </svg>
                                                    Please be aware that N{{ $bvn_v2_fee->amount }}.verification fee
                                                    will be deducted from your wallet balance regardless of the
                                                    outcome, except in cases where the BVN is not successfully
                                                    verified due to a successful verification not being possible
                                                    (e.g. data not found). In such cases, the fee will still be
                                                    charged.
                                                </center>
                                            </div>

                                            <div class="alert alert-danger alert-dismissible text-center"
                                                 id="errorMsg"
                                                 style="display:none;"
                                                 role="alert">
                                                <small id="message">Processing your request.</small>
                                            </div>
                                            <div class="row text-center">
                                                <div class="col-md-12">
                                                    <form id="verifyForm"
                                                          name="verifyForm"
                                                          method="POST">
                                                        @csrf
                                                        <div class="row mb-3">
                                                            <div class="col-md-12 mx-auto">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <p class="text-muted mb-2">Verify BVN Number</p>
                                                                <input type="text"
                                                                       id="bvn"
                                                                       name="bvn"
                                                                       value=""
                                                                       class="form-control text-center"
                                                                       maxlength="11"
                                                                       required />
                                                            </div>
                                                            <div class="col-md-12 mx-auto">
                                                            </div>
                                                        </div>
                                                        <button type="submit"
                                                                id="verifyBVN"
                                                                class="btn btn-primary"><i class="lar la-check-circle"></i>
                                                            Check BVN
                                                            Details</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">


                                    <div class="card-title">
                                        <i class="ri-user-search-line fw-bold"></i> Verified Information
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 row">
                                        <div class="alert alert-danger alert-dismissible text-center"
                                             id="errorMsg2"
                                             style="display:none;"
                                             role="alert">
                                            <small id="message2">Processing your request.</small>
                                        </div>

                                        <div class="validation-info col-md-12 mb-2 hidden"
                                             id="validation-info">
                                            <center>
                                                <img src="{{ asset('assets/images/search.png') }}"
                                                     width="20%"
                                                     alt="Search Icon">
                                                <p class="mt-5">This section will display search results </p>
                                            </center>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="btn-list text-center"
                                                 style="display:none;"
                                                 id="download">
                                                <a href="#"
                                                   id="freeSlip"
                                                   type="button"
                                                   class="btn btn-outline-info btn-wave"><i class="bi bi-download"></i>
                                                    Standard Slip
                                                    (&#x20A6;{{ $bvn_standard_fee->amount }})</a>
                                                <a href="#"
                                                   id="paidSlip"
                                                   type="button"
                                                   class="btn btn-primary btn-wave"><i class="bi bi-download"></i> Premium
                                                    Slip
                                                    (&#x20A6;{{ $bvn_premium_fee->amount }})</a>
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
@endsection
@section('page-js')
    <script src="{{ asset('assets/js/bvn-v2.js') }}"></script>
@endsection
