<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ZEPA Solutions - Easy Verifications for your Business">
    <meta name="keywords" content="NIMC, BVN, ZEPA, Verification, Airtime, Bills, Identity">
    <meta name="author" content="Zepa Developers">
    <title>ZEPA Solutions - Easy Verifications for your Business</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        .message-box {
            padding: 20px;
            border: 2px solid #ff0000;
            display: inline-block;
            background-color: #ffe6e6;
            border-radius: 8px;
        }
        .error-message {
            color: #ff0000;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .info {
            font-size: 14px;
            color: #666;
        }
    </style>
    <script>
        // Redirect to index.php after 3 seconds
        setTimeout(function() {
            window.location.href = "{{ url('/') }}";
        }, 3000);
    </script>
</head>
<body>
    <div class="message-box">
        <p class="error-message">{{ $error }}</p>
        <p class="info">You will be redirected to the homepage in 3 seconds.</p>
    </div>
</body>
</html>
