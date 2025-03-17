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
            @if ($mail_data['type'] == 'Rejected')
            <p>Dear {{$mail_data['name'] }},</p>
            <p>We regret to inform you that after reviewing your KYC data, we have decided to reject your application. Please provide correct identification details in order to proceed. We appreciate your cooperation and look forward to re-reviewing your application.</p>
            <p>Thank you for your understanding.</p>

            @elseif($mail_data['type'] == 'Submitted')
            <p>Dear {{$mail_data['name'] }},</p>
            <p>Thank you for submitting your KYC application. We have received your application and our team will review it within the next 30 minutes. You will receive an email notification with the status of your KYC application shortly. Alternatively, you can check the portal for updates.</p>
            <p>Thank you for your patience and cooperation.</p>

            @elseif($mail_data['type'] == 'Verified')
             <p>Dear {{$mail_data['name'] }},</p>
            <p>We are pleased to inform you that your KYC application has been successfully verified! You can now proceed to access the portal by clicking the button below:</p>
            <p><a href="https://zepasolutions.com/" class="btn-primary">Access Portal</a></p>

            @else
            <p>Dear {{$mail_data['name'] }},</p>
            <p>Thank you for your patience and cooperation throughout the verification process. Please click the link below to proceed:</p>
            <p><a href="https://zepasolutions.com/" class="btn-primary">Proceed</a></p>
            @endif
        </div>

        <!-- Footer Section -->
        <div class="email-footer">
            <p>Warm regards,</p>
            <p><strong>ZEPA Solutions Team</strong></p>
        </div>
    </div>
@endsection

