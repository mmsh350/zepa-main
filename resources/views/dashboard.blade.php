@extends('layouts.dashboard')
@section('title', 'Settings')
@section('content')
    <div class="page">
        <!------App Header ----->
        @include('components.app-header')
        @include('components.app-sidebar')



        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">
                @include('components.news')

                <!-- Start::page-header -->
                <div class="d-md-flex d-block align-items-center justify-content-between my-2 page-header-breadcrumb">
                    <div>
                        <p class="fw-semibold fs-18 mb-0">Welcome back, {{ Auth::user()->first_name }} !</p>
                        <span class="fs-semibold text-muted">Centralize your workflow and track all your activities,
                            from start to finish.</span>
                    </div>
                    <div class="alert alert-outline-light d-flex align-items-center shadow-lg d-none d-md-block"
                        role="alert">
                        <div>
                            <small class="fw-semibold mb-0 fs-15 ">Referral Code :
                                {{ Auth::user()->referral_code }}</small>
                        </div>
                    </div>
                </div>
                @if ($note != '')
                    <div class="alert alert-secondary shadow-sm alert-dismissible fade show text-dark">
                        {!! $note->notes !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                                class="bi bi-x"></i></button>
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
                                                        <a href="{{ route('funding') }}">
                                                            <span
                                                                class="avatar avatar-md avatar-rounded bg-primary-transparent">
                                                                <i class="ti ti-wallet fs-16"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="flex-fill ms-3">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between flex-wrap">
                                                            <div>
                                                                <p class="text-muted mb-0">Wallet Balance</p>
                                                                <h4 class="fw-semibold mt-1">
                                                                    &#x20A6;{{ number_format($wallet_balance), 2 }}
                                                                </h4>
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
                                                        <a href="{{ route('claim') }}">
                                                            <span
                                                                class="avatar avatar-md avatar-rounded bg-info-transparent">
                                                                <i class="ti ti-briefcase fs-16"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="flex-fill ms-3">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between flex-wrap">
                                                            <div>
                                                                <p class="text-muted mb-0">Referral Bonus</p>
                                                                <h4 class="fw-semibold mt-1">
                                                                    &#x20A6;{{ number_format($bonus_balance), 2 }}</h4>
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
                                                    <div><a href="{{ route('transactions') }}">
                                                            <span
                                                                class="avatar avatar-md avatar-rounded bg-danger-transparent">
                                                                <i class="ri-exchange-funds-line fs-16"></i>
                                                            </span>
                                                    </div></a>
                                                    <div class="flex-fill ms-3">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between flex-wrap">
                                                            <div>
                                                                <p class="text-muted mb-0">Transactions</p>
                                                                <h4 class="fw-semibold mt-1">{{ $transaction_count }}
                                                                </h4>
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
                                                        <a href="{{ route('more-services', 'transfer') }}"> <img
                                                                class="img-fluid" width="22%"
                                                                src="{{ asset('assets/images/apps/transfer.png') }}">
                                                            <p>Transfer</p>
                                                        </a>
                                                    </div>
                                                    <div class="col-6 col-md-3 text-center  mt-2">
                                                        <a href="{{ route('airtime') }}"><img class="img-fluid"
                                                                width="22%"
                                                                src="{{ asset('assets/images/apps/airtime.png') }}">
                                                            <p>Buy Airtime</p>
                                                        </a>
                                                    </div>
                                                    <div class="col-6 col-md-3 text-center  mt-2">
                                                        <a href="{{ route('more-services', 'data') }}"><img
                                                                class="img-fluid" width="22%"
                                                                src="{{ asset('assets/images/apps/data.png') }}">
                                                            <p>Buy Internet Data</p>
                                                        </a>
                                                    </div>
                                                    <div class="col-6 col-md-3 text-center  mt-2">
                                                        <a href="{{ route('electricity') }}"> <img class="img-fluid"
                                                                width="22%"
                                                                src="{{ asset('assets/images/apps/electric.png') }}">
                                                            <p>Pay Electric Bills</p>
                                                        </a>
                                                    </div>
                                                    <div class="col-6 col-md-3 text-center  mt-2">
                                                        <a href="{{ route('tv') }}"> <img class="img-fluid"
                                                                width="22%"
                                                                src="{{ asset('assets/images/apps/tv.png') }}">
                                                            <p>Pay TV Subscription</p>
                                                        </a>
                                                    </div>

                                                    <div class="col-6 col-md-3 text-center  mt-2">
                                                        <a href="{{ route('education') }}"> <img class="img-fluid"
                                                                width="22%"
                                                                src="{{ asset('assets/images/apps/education.png') }}">
                                                            <p>Educational Pin</p>
                                                        </a>
                                                    </div>
                                                    <div class="col-6 col-md-3 text-center  mt-2">
                                                        <a href="{{ route('more-services', 'verifications') }}"> <img
                                                                class="img-fluid" width="22%"
                                                                src="{{ asset('assets/images/apps/identity.png') }}">
                                                            <p>Verification</p>
                                                        </a>
                                                    </div>
                                                    <div class="col-6 col-md-3 text-center  mt-2">
                                                        <a href="{{ route('more-services', 'agency') }}"> <img
                                                                class="img-fluid" width="22%"
                                                                src="{{ asset('assets/images/apps/modify.png') }}">
                                                            <p>Agency Services</p>
                                                        </a>
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
                                                <small class="fw-semibold">Fund your wallet instantly by depositing
                                                    into the virtual account number</small>
                                                <ul class="list-unstyled crm-top-deals mb-0 mt-3">
                                                    @if ($virtual_accounts != null)
                                                        @foreach ($virtual_accounts as $data)
                                                            <li>
                                                                <div class="d-flex align-items-top flex-wrap">
                                                                    <div class="me-2">
                                                                        <span class="avatar avatar-sm avatar-rounded">
                                                                            @if ($data->bankName == 'Wema bank')
                                                                                <img src="{{ asset('assets/images/wema.jpg') }}"
                                                                                    alt="">
                                                                            @elseif($data->bankName == 'Moniepoint Microfinance Bank')
                                                                                <img src="{{ asset('assets/images/moniepoint.jpg') }}"
                                                                                    alt="">
                                                                            @elseif($data->bankName == 'PalmPay')
                                                                                <img src="{{ asset('assets/images/palmpay.png') }}"
                                                                                    alt="">
                                                                            @else
                                                                                <img src="{{ asset('assets/images/sterling.png') }}"
                                                                                    alt="">
                                                                            @endif
                                                                        </span>
                                                                    </div>
                                                                    <div class="flex-fill">
                                                                        <p class="fw-semibold mb-0">
                                                                            {{ $data->accountName }}</p>
                                                                        <span
                                                                            class="fs-14 acctno">{{ $data->accountNo }}</span>
                                                                        <br>
                                                                        <span class=" fs-12">{{ $data->bankName }}
                                                                        </span>
                                                                    </div>
                                                                    <div class="fw-semibold fs-15"><a href="#"
                                                                            class="btn btn-light btn-sm copy-account-number">Copy</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                                <hr>
                                                <center>
                                                    <a href="{{ route('support') }}">
                                                        <small class="fw-semibol text-danger">If your funds is not
                                                            received within 30mins.
                                                            Please Contact Support
                                                            <i class="bx bx-headphone side-menu__icon"
                                                                style="font-size:24px"></i>
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
                                                        <a href="{{ route('more-services', 'transfer') }}"> <img
                                                                class="img-fluid" width="22%"
                                                                src="{{ asset('assets/images/apps/transfer.png') }}">
                                                            <p>Transfer</p>
                                                        </a>
                                                    </div>
                                                    <div class="col-6 col-md-3 text-center  mt-2">
                                                        <a href="{{ route('airtime') }}"><img class="img-fluid"
                                                                width="22%"
                                                                src="{{ asset('assets/images/apps/airtime.png') }}">
                                                            <p>Buy Airtime</p>
                                                        </a>
                                                    </div>
                                                    <div class="col-6 col-md-3 text-center  mt-2">
                                                        <a href="{{ route('more-services', 'data') }}"><img
                                                                class="img-fluid" width="22%"
                                                                src="{{ asset('assets/images/apps/data.png') }}">
                                                            <p>Buy Internet Data</p>
                                                        </a>
                                                    </div>
                                                    <div class="col-6 col-md-3 text-center  mt-2">
                                                        <a href="{{ route('electricity') }}"> <img class="img-fluid"
                                                                width="22%"
                                                                src="{{ asset('assets/images/apps/electric.png') }}">
                                                            <p>Pay Electric Bills</p>
                                                        </a>
                                                    </div>
                                                    <div class="col-6 col-md-3 text-center  mt-2">
                                                        <a href="{{ route('tv') }}"> <img class="img-fluid"
                                                                width="22%"
                                                                src="{{ asset('assets/images/apps/tv.png') }}">
                                                            <p>Pay TV Subscription</p>
                                                        </a>
                                                    </div>

                                                    <div class="col-6 col-md-3 text-center  mt-2">
                                                        <a href="{{ route('education') }}"> <img class="img-fluid"
                                                                width="22%"
                                                                src="{{ asset('assets/images/apps/education.png') }}">
                                                            <p>Educational Pin</p>
                                                        </a>
                                                    </div>
                                                    <div class="col-6 col-md-3 text-center  mt-2">
                                                        <a href="{{ route('more-services', 'verifications') }}"> <img
                                                                class="img-fluid" width="22%"
                                                                src="{{ asset('assets/images/apps/identity.png') }}">
                                                            <p>Verification</p>
                                                        </a>
                                                    </div>
                                                    <div class="col-6 col-md-3 text-center  mt-2">
                                                        <a href="{{ route('more-services', 'agency') }}"> <img
                                                                class="img-fluid" width="22%"
                                                                src="{{ asset('assets/images/apps/modify.png') }}">
                                                            <p>Agency Services</p>
                                                        </a>
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
                                                @if (!$transactions->isEmpty())
                                                    @php
                                                        $currentPage = $transactions->currentPage(); // Current page number
                                                        $perPage = $transactions->perPage(); // Number of items per page
                                                        $serialNumber = ($currentPage - 1) * $perPage + 1; // Starting serial number for current page
                                                    @endphp
                                                    <div class="table-responsive">
                                                        <table class="table text-nowrap"
                                                            style="background:#fafafc !important">
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
                                                                @foreach ($transactions as $data)
                                                                    <tr>
                                                                        <th scope="row">{{ $serialNumber++ }}</th>
                                                                        <td>{{ date('F j, Y', strtotime($data->created_at)) }}
                                                                        </td>
                                                                        <td>{{ $data->service_type }}</td>
                                                                        <td>
                                                                            @if ($data->status == 'Approved')
                                                                                <span
                                                                                    class="badge bg-outline-success">{{ $data->status }}</span>
                                                                            @elseif ($data->status == 'Rejected')
                                                                                <span
                                                                                    class="badge bg-outline-danger">{{ $data->status }}</span>
                                                                            @elseif ($data->status == 'Pending')
                                                                                <span
                                                                                    class="badge bg-outline-warning">{{ $data->status }}</span>
                                                                            @endif
                                                                        </td>
                                                                        <td>{{ $data->service_description }}</td>
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
                                                    <center><img width="65%"
                                                            src="{{ asset('assets/images/no-transaction.gif') }}"
                                                            alt=""></center>
                                                    <p class="text-center fw-semibold  fs-15"> No Available Transaction
                                                    </p>
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


    @endsection
