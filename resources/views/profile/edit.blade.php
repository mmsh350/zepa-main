@extends('layouts.dashboard')
@section('title', 'Settings')
@section('content')
    <div class="page">

        @include('components.app-header')

        @include('components.app-sidebar')

        <div class="main-content app-content custom-margin-top">
            <div class="container-fluid">

                <!-- Start::Password Update Section -->
                <div class="row mt-4">

                    <div class="col-xxl-12  col-md-12">
                         @if (session('message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                     Profile Update successful
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
                        <div class="card custom-card mb-4">
                            
                            <div class="card-header">
                                <h5 class="card-title">Profile</h5>
                            </div>
                            <div class="card-body">
                                
                               <div class="text-center mb-3">
               @if (Auth::user()->profile_pic != '')
                                 <img alt="img" width="100" height="100" class="rounded-circle"
                                     src="{{ 'data:image/;base64,' . Auth::user()->profile_pic }}">
                             @else
                                 <img alt="img" width="50" height="50" class="rounded-circle"
                                     src="{{ asset('assets/images/zepa-logo.jpg') }}" alt="">
                             @endif
                <h4 class="mt-2">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4>
                 <span class="badge bg-primary rounded text-white px-3 py-2">{{ ucfirst(Auth::user()->role) }}</span>
            </div>

            <form method="POST" action="{{ route('profile.update') }}"  enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
                </div>

                <div class="mb-3">
                    <label>Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" value="{{ Auth::user()->phone_number }}">
                </div>

                <div class="mb-3">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                        <option value="Male" {{ Auth::user()->gender === 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ Auth::user()->gender === 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                  <div class="mb-3">
                                            <label for="profile_pic" class="form-label">Change Profile Picture</label>
                                            <input type="file" class="form-control" name="profile_pic" id="profile_pic">
                                        </div>

                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-12  col-md-6">
                        <div class="card custom-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Update Password</h5>
                            </div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Password Update Successful.
                                    </div>
                                @endif

                                <form method="post" action="{{ route('profile.password') }}">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">Current Password</label>
                                        <input type="password" class="form-control" id="current_password"
                                            name="current_password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id="new_password" name="new_password"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password_confirmation" class="form-label">Confirm New
                                            Password</label>
                                        <input type="password" class="form-control" id="new_password_confirmation"
                                            name="new_password_confirmation" required>
                                    </div>
                                    <button type="submit" id="change_password" class="btn btn-primary">Update
                                        Password</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- Start::PIN Modification Section -->

                    <div class="col-xxl-12  col-md-6">
                        <div class="card custom-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Create/Update Transaction PIN</h5>
                            </div>
                            <div class="card-body" style="margin-bottom:105px;">
                                <small class="text-dark">To create or update your PIN, enter your password and the One-Time
                                    Password (OTP) sent to your registered email."</small>
                                <div class="mb-2 mt-2" id="errMsg"></div>
                                <form id="update-pin-form">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="password_for_pin" class="form-label">Enter Your Password</label>
                                        <input type="password" class="form-control" id="password_for_pin" name="password"
                                            required>
                                    </div>
                                    <button type="submit" id="send-otp" class="btn btn-primary"> Send OTP
                                        <div class="lds-ring" id="spinner">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- OTP Modal -->
                    <div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="otpModalLabel">Enter OTP</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-2" id="modal_err"></div>
                                    <form id="otp-form">
                                        @csrf
                                        <div class="mb-3">
                                            <p>OTP sent to your registered email address. Please check your inbox. <br />
                                            </p>
                                            <label for="otp" class="form-label">OTP</label>
                                            <input type="text" class="form-control" maxlength="6" id="otp"
                                                name="otp" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="new_pin" class="form-label">New PIN</label>
                                            <input type="text" class="form-control" maxlength="4" id="new_pin"
                                                name="pin" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="verify-otp">Verify OTP
                                        <div class="lds-ring" id="spinner2">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>



                    @if (Auth::user()->role != 'agent')
                        <div class="col-xxl-12  col-md-6">
                            <div class="card custom-card">

                                <div class="card-header">
                                    <h5 class="card-title"> Account Upgrade</h5>
                                </div>
                                <div class="card-body">

                                    <div class="alert alert-danger alert-dismissible text-center" id="errorMsg"
                                        style="display:none;" role="alert">
                                        <small id="message">Processing your request.</small>
                                    </div>
                                    <div class="alert alert-success alert-dismissible text-center" id="successMsg"
                                        style="display:none;" role="alert">
                                        <small id="smessage">Processing your request.</small>
                                    </div>


                                    <form id="form" name="form">
                                        @csrf
                                        <fieldset>
                                            <p class="text-center">Upgrade your account now and unlock access to our
                                                exclusive agency services. Take your experience to the next level!</p>
                                            <div class="mb-3 col-md-12">
                                                <select id="type" name="type"
                                                    class="form-select mt-3 text-center">
                                                    <option value=""> --- Select Package---</option>
                                                    <option value="agent">Agent Package </option>
                                                </select>
                                            </div>
                                            <center>
                                                <button type="button" id="upgrade" class="btn btn-primary mb-3"><i
                                                        class="las la-sync-alt"></i> Activate Now</button>
                                            </center>

                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Start::Notification Settings Section -->

                    <div class="col-xxl-12  col-md-6">
                        <div class="card custom-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Notification Settings</h5>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form method="post" action="{{ route('notification.update') }}">
                                    @csrf
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="notification_sound"
                                            name="notification_sound" {{ $is_enabled ? 'checked' : '' }}>
                                        <label class="form-check-label" for="notification_sound">
                                            Enable Notification Sound
                                        </label>
                                    </div>
                                    <button type="submit" id="notify" class="btn btn-primary mt-3">Save
                                        Setting</button>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>


            </div>
        </div>
        <!-- End::row-1 -->
    </div>
@endsection
@push('page-js')
    <script>
        const pinVerifyRoute = @json(route('pin.verify'));
        const pinUpdateRoute = @json(route('pin.update'));
    </script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const submitButton = document.getElementById('change_password');

            form.addEventListener('submit', function(event) {
                // Ensure form submission does not happen multiple times
                if (!submitButton.disabled) {
                    submitButton.disabled = true;
                    submitButton.innerText = 'Processing request...';
                }
            });

            // Optional: If you have a notify button that triggers another action
            const notifyButton = document.getElementById('notify');
            notifyButton.addEventListener('submit', function() {
                notifyButton.disabled = true;
                notifyButton.innerText = 'Processing request...';
            });
        });
    </script>
@endpush
