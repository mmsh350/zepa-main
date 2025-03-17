@extends('layouts.email')
@section('title', 'KYC Status')
@section('content')
    <div class="email-container">
        <!-- Header Section -->
        <div class="email-header">
            <div class="email-logo">
                <img src="{{ asset('assets/kyc/img/kyc-img.png') }}" alt="ZEPA Solutions Logo">
            </div>
            <h2>KYC Status Update</h2>
        </div>

        <!-- Body Section -->
        <div class="email-body">
            <p>Dear Admin,</p>
            <p>A new KYC verification is awaiting your review. Please log in to the portal to review and verify the application. Thank you for your prompt attention to this matter.</p>
            <p>To access the application, please click the button below:</p>
            <p><a href="https://zepasolutions.com" class="btn-primary">Check it out</a></p>
        </div>

        <!-- Footer Section -->
        <div class="email-footer">
            <p>Warm regards,</p>
            <p><strong>ZEPA Solutions Team</strong></p>
        </div>
    </div>
    @endsection
