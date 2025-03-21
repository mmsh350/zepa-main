@extends('layouts.dashboard')
@section('title', 'VNIN to NIBSS')
@section('content')
    <div class="page">

        @include('components.app-header')
        @include('components.app-sidebar')
        <div class="main-content app-content">
            <div class="container-fluid">
                <!-- Start::page-header -->
                <div class="d-md-flex d-block align-items-center justify-content-between my-2 page-header-breadcrumb">
                    <div>
                        <p class="fw-semibold fs-18 mb-0">VNIN TO NIBSS</p>
                        <span class="fs-semibold text-muted">Submit VNIN TO NIBSS request with required information for
                            assistance with VNIN Issues.</span>
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
                                                    <img class="img-fluid" src="{{ asset('assets/images/nimc.png') }}"
                                                        width="30%">
                                                </center>
                                                <small class=" font-italic"><i>Please note that this request will be
                                                        processed within 2 working days. We appreciate your patience and
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
                                                <form id="form" name="vnin-to-nibss" method="POST"
                                                    action="{{ route('request-vnin-to-nibss') }}">
                                                    @csrf
                                                    <div class="row mb-2">

                                                        <div class="col-md-12">
                                                            <p class="mb-2 form-label mt-2"> Request ID</p>
                                                            <input type="text" name="request_id" id="request_id"
                                                                maxlength="7" class="form-control text-center" required />
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <p class="mb-2 form-label"> BVN No. </p>
                                                            <input type="text" name="bvn_number" id="bvn_number"
                                                                class="form-control phone text-center" maxlength="11"
                                                                required />
                                                        </div>
                                                        <div class="col-md-12">
                                                            <p class="mb-2 form-label mt-2"> NIN No.</p>
                                                            <input type="text" name="nin_number" id="nin_number"
                                                                maxlength="11" class="form-control text-center" required />
                                                        </div>
                                                        <p class="mt-3 fw-bold"> Service Fee:
                                                            &#x20A6;{{ number_format($ServiceFee), 2 }}</p>
                                                    </div>
                                                    <button type="submit" id="vnin-to-nibss" class="btn btn-primary"><i
                                                            class="las la-share"></i> Submit
                                                        Request</button>
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
                                                <p>Check the status of your request from the this section. You can track
                                                    the progress and updates on your request
                                                    @if (!$vnin->isEmpty())
                                                        @php
                                                            $currentPage = $vnin->currentPage(); // Current page number
                                                            $perPage = $vnin->perPage(); // Number of items per page
                                                            $serialNumber = ($currentPage - 1) * $perPage + 1; // Starting serial number for current page
                                                        @endphp
                                                        <div class="table-responsive">
                                                            <table class="table text-nowrap"
                                                                style="background:#fafafc !important">
                                                                <thead>
                                                                    <tr class="table-primary">
                                                                        <th width="5%" scope="col">ID</th>
                                                                        <th scope="col">Reference No.</th>
                                                                        <th scope="col">Request ID </th>
                                                                        <th scope="col" class="text-center">Status
                                                                        </th>
                                                                        <th scope="col">Query</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($vnin as $data)
                                                                        <tr>
                                                                            <th scope="row">{{ $serialNumber++ }}
                                                                            </th>
                                                                            <td>{{ Str::upper($data->refno) }}</td>
                                                                            <td>{{ $data->requestId }}</td>
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
                                                                                @else
                                                                                    <span
                                                                                        class="badge bg-outline-primary">{{ Str::upper($data->status) }}</span>
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
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                            <!-- Pagination Links -->
                                                            <div class="d-flex justify-content-center">
                                                                {{ $vnin->links('vendor.pagination.bootstrap-4') }}
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


    </div>
@endsection
@push('page-js')
    <script>
        $(document).ready(function() {
            //Pay Modal
            $('#reason').on('shown.bs.modal', function(event) {
                var button = $(event.relatedTarget)

                var reason = button.data('reason')
                if (reason != '')
                    $("#message").html(reason);
                else
                    $("#message").html('No Message Yet.');

            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('form');
            const submitButton = document.getElementById('vnin-to-nibss');

            form.addEventListener('submit', function() {
                submitButton.disabled = true;
                submitButton.innerText = 'Please wait while we process your request...';
            });
        });
    </script>
@endpush
