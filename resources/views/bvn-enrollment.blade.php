@extends('layouts.dashboard')
@section('title', 'Claim Referral Bonus')
@section('content')
    <div class="page">

        @include('components.app-header')
        @include('components.app-sidebar')
        <div class="main-content app-content">
            <div class="container-fluid">
                <!-- Start::page-header -->
                <div class="d-md-flex d-block align-items-center justify-content-between my-2 page-header-breadcrumb">
                    <div>
                        <p class="fw-semibold fs-18 mb-0">BVN Enrollment</p>
                        <span class="fs-semibold text-muted">Apply for BVN Enrollment: Become an Authorized Agent for
                            BVN Support</span>
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
                                                                <p class="text-muted mb-0">Successful</p>
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
                                                                <p class="text-muted mb-0">Submitted/Rejected</p>
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
                                                    Enrollment Request
                                                </div>
                                            </div>
                                            <div class="card-body ">
                                                <center>
                                                    <img class="img-fluid" src="{{ asset('assets/images/bvn.jpg') }}"
                                                        width="30%">
                                                </center>
                                                <center>
                                                    <small class="font-italic text-danger"><i>Please note that this
                                                            request will be processed in the next 5 Working days. Kindly
                                                            provide a valid email address and phone nummber.</i></small>
                                                </center>
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
                                                <form name="enroll" id="enroll" method="POST"
                                                    action="{{ route('enroll') }}">
                                                    @csrf
                                                    <div class="mb-3 row">

                                                        <div class="col-md-12 ">
                                                            <div class="row">
                                                                <div class="col-md-12 mt-2">
                                                                    <p class="form-label">Enrollment Type</p>
                                                                    <select name="enrollment_type" id="enrollment_type"
                                                                        required class="form-select text-center"
                                                                        aria-label="Default select example">
                                                                        <option value="">Select</option>
                                                                        <option value="1">Self</option>
                                                                        <option value="2">Agent </option>
                                                                    </select>
                                                                    <input hidden id="selfid"
                                                                        value="{{ Auth::user()->phone_number }}">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div id="wallet_div">
                                                            <div class="col-md-12 mt-2 mb-0 ">
                                                                <p class="form-label">Wallet ID</p>
                                                                <small>Please enter zepa wallet id of the
                                                                    applicant</small>
                                                                <input type="text" id="wallet_id" name="wallet_id"
                                                                    maxlength="11" class="form-control  " />
                                                                <p id="reciever"></p>
                                                            </div>
                                                        </div>
                                                        <div id="data">
                                                            <div class="col-md-12 mt-2 mb-0">
                                                                <p class="form-label">Username</p>
                                                                <input type="text" id="username" name="username"
                                                                    class="form-control  " required />
                                                            </div>
                                                            <div class="col-md-12  mt-2 mb-0">
                                                                <p class="form-label">Fullname</p>
                                                                <input type="text" id="fullname" name="fullname"
                                                                    class="form-control  " required />
                                                            </div>
                                                            <div class="col-md-12  mt-2 mb-0">
                                                                <p class="form-label">Email Address</p>
                                                                <input type="text" id="email" name="email"
                                                                    class="form-control  " required />
                                                            </div>
                                                            <div class="col-md-12  mt-2 mb-0">
                                                                <p class="form-label">Phone Number</p>
                                                                <input type="text" id="phone" name="phone"
                                                                    maxlength="11" class="form-control  " required />
                                                            </div>

                                                            <div class="col-md-12 mt-2">
                                                                <div class="row">
                                                                    <div class="col-md-6  mt-2 mb-0">
                                                                        <p class="form-label">State</p>
                                                                        <input type="text" id="state"
                                                                            name="state" class="form-control  "
                                                                            required />
                                                                    </div>
                                                                    <div class="col-md-6 mt-2 mb-0">
                                                                        <p class="form-label">LGA </p>
                                                                        <input type="text" id="lga"
                                                                            name="lga" class="form-control  "
                                                                            required />
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12  mt-2 mb-0">
                                                                <p class="form-label">Business Address </p>
                                                                <textarea class="form-control" name="address" id="address" required></textarea>
                                                            </div>
                                                            <div class="col-md-12 mt-2">
                                                                <div class="row">
                                                                    <div class="col-md-6  mt-2 mb-0">
                                                                        <p class="form-label">BVN</p>
                                                                        <input type="text" id="bvn"
                                                                            name="bvn" maxlegnth="11"
                                                                            class="form-control" required />
                                                                    </div>
                                                                    <div class="col-md-6 mt-2 mb-0">
                                                                        <p class="form-label">Account Number </p>
                                                                        <input type="text" id="account_number"
                                                                            name="account_number" maxlegnth="10"
                                                                            class="form-control  " required />
                                                                    </div>
                                                                    <div class="col-md-6 mt-2 mb-0">
                                                                        <p class="form-label">Bank Name </p>
                                                                        <input type="text" id="bank_name"
                                                                            name="bank_name" class="form-control  "
                                                                            required />
                                                                    </div>
                                                                    <div class="col-md-6 mt-2 mb-0">
                                                                        <p class="form-label">Account Name </p>
                                                                        <input type="text" id="account_name"
                                                                            name="account_name" class="form-control  "
                                                                            required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-1 mb-2">
                                                        <h6>* Key Notes:</h6>
                                                        <small class="text-danger">Account Most be traditional bank
                                                            account, not a fintech or digital banking account
                                                        </small><br />
                                                        <small class="text-danger fw-bold">Andriod Access only </small>
                                                        <p class="fw-bold"> Enrollment Fee:
                                                            &#x20A6;{{ number_format($ServiceFee), 2 }}</p>

                                                    </div>
                                                    <button type="submit" id="submit" name="submit"
                                                        class="btn btn-primary"><i class="las la-share"></i> Submit
                                                        Request</button>
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
                                                    @if (!$enrollments->isEmpty())
                                                        @php
                                                            $currentPage = $enrollments->currentPage(); // Current page number
                                                            $perPage = $enrollments->perPage(); // Number of items per page
                                                            $serialNumber = ($currentPage - 1) * $perPage + 1; // Starting serial number for current page
                                                        @endphp
                                                        <div class="table-responsive">
                                                            <table class="table text-nowrap"
                                                                style="background:#fafafc !important">
                                                                <thead>
                                                                    <tr class="table-primary">
                                                                        <th width="5%" scope="col">ID</th>
                                                                        <th scope="col">Type</th>
                                                                        <th scope="col">Wallet ID</th>
                                                                        <th scope="col">Fullname</th>
                                                                        <th scope="col" class="text-center">Status
                                                                        </th>
                                                                        <th scope="col">Query</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php $i = 1; @endphp
                                                                    @foreach ($enrollments as $data)
                                                                        <tr>
                                                                            <th scope="row">{{ $serialNumber++ }}
                                                                            </th>
                                                                            <td>{{ strtoupper($data->type) }}</td>
                                                                            <td>{{ $data->wallet_id }}</td>
                                                                            <td>{{ $data->fullname }}</td>
                                                                            <td class="text-center">
                                                                                @if ($data->status == 'successful')
                                                                                    <span
                                                                                        class="badge bg-outline-success">{{ Str::upper($data->status) }}</span>
                                                                                @elseif($data->status == 'rejected')
                                                                                    <span
                                                                                        class="badge bg-outline-danger">{{ Str::upper($data->status) }}</span>
                                                                                @elseif($data->status == 'submitted')
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
                                                                {{ $enrollments->links('vendor.pagination.bootstrap-4') }}
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

        <div class="modal fade" id="requirements" aria-labelledby="requirements" data-bs-keyboard="true"
            aria-hidden="true">
            <!-- Scrollable modal -->
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="staticBackdropLabel2">Required Documents
                        </h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Please note that all modifications require a valid means of identification and a court
                            affidavit. Accepted forms of identification include:</p>
                        <ul>
                            <li>NIMC slip</li>
                            <li>Voter's card (please scan both the front and back of the card)</li>
                            <li>Driver's license</li>
                            <li>International passport</li>
                        </ul>
                        <p>We appreciate your cooperation in providing the necessary documentation to facilitate the
                            modification process.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page-js')
    <script src="{{ asset('assets/js/wallet2.js') }}"></script>
    <script src="{{ asset('assets/js/logout.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('enroll');
            const submitButton = document.getElementById('submit');

            form.addEventListener('submit', function() {
                submitButton.disabled = true;
                submitButton.innerText = 'Please wait while we process your request...';
            });
        });
    </script>
@endpush
