@extends('layouts.dashboard')
@section('title', 'Account Upgrade')
@section('content')
    <div class="page">

        @include('components.app-header')
        @include('components.app-sidebar')
        <div class="main-content app-content">
            <div class="container-fluid">
                <!-- Start::page-header -->
                <div class="d-md-flex d-block align-items-center justify-content-between my-2 page-header-breadcrumb">
                    <div>
                        <p class="fw-semibold fs-18 mb-0">Account Upgrade</p>
                        <span class="fs-semibold text-muted">Submit an account upgrade request, fill the upgrade form
                            and submit</span>
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
                                                        <span
                                                            class="avatar avatar-md avatar-rounded bg-primary-transparent">
                                                            <i class="las la-tasks"></i>
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill ms-3">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between flex-wrap">
                                                            <div>
                                                                <p class="text-muted mb-0">Request</p>
                                                                <h4 class="fw-semibold mt-1">{{ $total_request }}</h4>
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
                                                        <span
                                                            class="avatar avatar-md avatar-rounded bg-success-transparent">
                                                            <i class="las la-check-double"></i>
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill ms-3">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between flex-wrap">
                                                            <div>
                                                                <p class="text-muted mb-0">Resolved</p>
                                                                <h4 class="fw-semibold mt-1">{{ $resolved }}</h4>
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
                                                        <div
                                                            class="d-flex align-items-center justify-content-between flex-wrap">
                                                            <div>
                                                                <p class="text-muted mb-0">Pending/Rejected</p>
                                                                <h4 class="fw-semibold mt-1">
                                                                    {{ $pending + $rejected }}</h4>
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
                            <div class="col-xl-5">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card custom-card">
                                            <div class="card-header  justify-content-between">
                                                <div class="card-title">
                                                    Upgrade Request
                                                </div>
                                            </div>
                                            <div class="card-body text-center">
                                                <center>
                                                    <img class="img-fluid" src="{{ asset('assets/images/bank.jpg') }}"
                                                        width="40%">
                                                </center>
                                                <small class=" font-italic"><i>Please note that this request will be
                                                        processed within 5 working days. We appreciate your patience and
                                                        will keep you updated on the status.</i></small>
                                                @if (session('success'))
                                                    <div class="alert alert-success alert-dismissible fade show"
                                                        role="alert">
                                                        {{ session('success') }}
                                                    </div>
                                                @endif

                                                @if (session('error'))
                                                    <div class="alert alert-danger alert-dismissible fade show"
                                                        role="alert">
                                                        {{ session('error') }}
                                                    </div>
                                                @endif

                                                @if ($errors->any())
                                                    <div class="alert alert-danger alert-dismissible fade show"
                                                        role="alert">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <form id="form" name="upgrade-form" method="POST"
                                                    action="{{ route('upgrade-account') }}" enctype="multipart/form-data">
                                                    @csrf


                                                    <div class="mb-1 row">

                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-1 mb-2">

                                                            <p><small><span class="fw-bold text-danger">Instruction:</span>
                                                                    <span>Download the Upgrade Form from the available
                                                                        banks, fill it out, scan it along with your
                                                                        National Identity Card and Nepa bill into a
                                                                        single PDF, and submit to track the status in
                                                                        the Request History.</span></small> </p>
                                                            <p class="text-decoration-underline fw-bold"> Available
                                                                Banks</p>
                                                            <ol class="list-unstyled">
                                                                <li>GT Bank &nbsp; - <a href="{{ route('gtb') }}"
                                                                        class="text-decoration-underline">Download </a>
                                                                </li>
                                                                <li>Wema Bank &nbsp; - <a href="{{ route('wema') }}"
                                                                        class="text-decoration-underline">Download </a>
                                                                </li>
                                                            </ol>

                                                            <p class="text-decoration-underline">
                                                                <a href="#" data-bs-toggle="modal"
                                                                    data-bs-target="#Terms">Terms and Conditions Apply.
                                                                    Please review before proceeding.
                                                                </a>
                                                            </p>

                                                            <p class="fw-bold"> Account Upgrade Fee:
                                                                &#x20A6;{{ number_format($ServiceFee), 2 }}</p>
                                                            <input class="form-control mt-2" type="file" name="documents"
                                                                id="documents" required />
                                                        </div>
                                                    </div>
                                                    <button type="submit" id="request" class="btn btn-primary"><i
                                                            class="las la-share"></i> Submit Request</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="row ">
                                    <div class="col-xl-12">
                                        <div class="card custom-card ">
                                            <div class="card-header justify-content-between">
                                                <div class="card-title">
                                                    Request History
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <p>Check the status of your request from the this section. You can track
                                                    the progress and updates on your request
                                                    @if (!$upgrades->isEmpty())
                                                        @php
                                                            $currentPage = $upgrades->currentPage(); // Current page number
                                                            $perPage = $upgrades->perPage(); // Number of items per page
                                                            $serialNumber = ($currentPage - 1) * $perPage + 1; // Starting serial number for current page
                                                        @endphp
                                                        <div class="table-responsive">
                                                            <table class="table text-nowrap"
                                                                style="background:#fafafc !important">
                                                                <thead>
                                                                    <tr class="table-primary">
                                                                        <th width="5%" scope="col">ID</th>
                                                                        <th scope="col">RefNo</th>
                                                                        <th scope="col" class="text-center">Status
                                                                        </th>
                                                                        <th scope="col" class="text-center">Query
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php $i = 1; @endphp
                                                                    @foreach ($upgrades as $data)
                                                                        <tr>
                                                                            <th scope="row">{{ $serialNumber++ }}
                                                                            </th>
                                                                            <td>{{ Str::upper($data->refno) }}</td>
                                                                            <td class="text-center">
                                                                                @if ($data->status == 'resolved')
                                                                                    <span
                                                                                        class="badge bg-outline-success">{{ Str::upper($data->status) }}</span>
                                                                                @elseif($data->status == 'rejected')
                                                                                    <span
                                                                                        class="badge bg-outline-danger">{{ Str::upper($data->status) }}</span>
                                                                                @elseif($data->status == 'pending')
                                                                                    <span
                                                                                        class="badge bg-outline-warning">{{ Str::upper($data->status) }}</span>
                                                                                @endif
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <a type="button" data-bs-toggle="modal"
                                                                                    data-id="2"
                                                                                    data-reason="{{ $data->reason }}"
                                                                                    data-bs-target="#reason"> <i
                                                                                        class="las la-info-circle bg-light"
                                                                                        style="font-size:24px"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                        @php $i++ @endphp
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                            <!-- Pagination Links -->
                                                            <div class="d-flex justify-content-center">
                                                                {{ $upgrades->links('vendor.pagination.bootstrap-4') }}
                                                            </div>
                                                        </div>
                                                    @else
                                                        <center><img width="65%"
                                                                src="{{ asset('assets/images/no-transaction.gif') }}"
                                                                alt=""></center>
                                                        <p class="text-center fw-semibold  fs-15"> No Request
                                                            Available!</p>
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

        <div class="modal fade" id="reason" tabindex="-1" aria-labelledby="reason" data-bs-keyboard="true"
            aria-hidden="true">
            <!-- Scrollable modal -->
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="staticBackdropLabel2">Support Query
                        </h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="message">No Message Yet.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="Terms" aria-labelledby="requirements" data-bs-keyboard="true"
            aria-hidden="true">
            <!-- Scrollable modal -->
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="staticBackdropLabel2">Bank Account Upgrade Terms and Conditions
                        </h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <p>NIN and BVN Information Consistency</p>
                        <p></p>
                        <p>To upgrade your bank account, ensure that the National Identification Number (NIN) and Bank
                            Verification Number (BVN) provided are identical. Discrepancies between these numbers will
                            result in the rejection of your upgrade request.</p>
                        <p>Signature and Passport Consistency</p>
                        <p></p>
                        <p>The signature and passport photo submitted with the account upgrade form must match the
                            information on your NIN and BVN records. Any discrepancies will lead to the rejection of
                            your request.</p>
                        <p>Accuracy of Uploaded Information</p>
                        <p></p>
                        <p>Carefully review and confirm that all account information is accurate before uploading. If
                            incorrect account information is submitted, your request will be rejected. Please note that
                            the account upgrade fee will not be refunded under these circumstances.</p>
                        <p>Form Submission and Approval</p>
                        <p></p>
                        <p>The completed and uploaded account upgrade form will be forwarded to the relevant bank
                            department for processing. The bank will handle the upgrade request and resolve any issues
                            as needed.</p>
                        <p>Account Status Requirement</p>
                        <p></p>
                        <p>Ensure that the account requesting the upgrade is not involved in any fraudulent activities.
                            Accounts found to be linked to fraud will be restricted, and the upgrade request will be
                            denied.</p>
                        <p>By proceeding with the account upgrade request, you acknowledge and agree to these terms and
                            conditions.</p>
                        <button id="proceed" class="btn btn-primary"> Continue </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('page-js')
    <script src="{{ asset('assets/js/accupgrade.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('form');
            const submitButton = document.getElementById('request');

            form.addEventListener('submit', function() {
                submitButton.disabled = true;
                submitButton.innerText = 'Please wait while we process your request...';
            });
        });
    </script>
@endpush
