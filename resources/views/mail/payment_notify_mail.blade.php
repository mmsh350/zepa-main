<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Easy Verifications for your Business">
    <meta name="keywords" content="NIMC, BVN, ZEPA, Verification, Airtime, Bills, Identity">
    <meta name="author" content="Zepa Developers">
    <title>ZEPA Solutions - Payment Notification</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            text-align: center;
            padding-bottom: 20px;
        }

        .email-header img {
            width: 130px;
        }

        .email-body {
            color: #333333;
            line-height: 1.6;
        }

        .email-body p {
            margin-bottom: 15px;
        }

        .email-footer {
            margin-top: 30px;
            font-size: 14px;
            color: #888888;
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Email Header -->
        <div class="email-header">
            <img src="{{ asset('assets/home/images/logo/logo.png') }}" alt="ZEPA Logo">
        </div>

        <!-- Email Body -->
        <div class="email-body">
            <h2>Payment Notification</h2>
            <p>Dear Customer,</p>

            @if ($mail_data['type'] == 'Topup')
            <p>Your wallet has been successfully funded with N{{$mail_data['amount']}} via {{$mail_data['bankName']}} transfer. Your wallet has been credited.</p>
            <p>Transaction Reference: {{$mail_data['ref']}}</p>
            @endif

            <p>Thank you for choosing ZEPA Solutions!</p>

            <p>Warm regards,<br>ZEPA Solutions</p>
        </div>

        <!-- Email Footer -->
        <div class="email-footer">
            <p>&copy; 2024 ZEPA Solutions. All rights reserved.</p>
            <p><a href="https://zepasolutions.com/" class="button">Visit our Website</a></p>
        </div>
    </div>
</body>

</html>
