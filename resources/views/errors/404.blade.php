<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Easy Verifications for your Business"/>
    <meta name="keywords" content="NIMC, BVN, ZEPA, Verification, Airtime, Bills, Identity">
    <meta name="author" content="Zepa Developers">
    <title>{{ $title ?? 'Page Not Found' }}</title>
    <link rel="icon" href="{{ asset('assets/home/images/favicon/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">
</head>
<body>
    <div class="page error-bg" id="particles-js">
        <div class="error-page">
            <div class="container text-center p-5 my-auto">
                <div class="row align-items-center justify-content-center h-100">
                    <div class="col-xl-7">
                        <p class="error-text mb-sm-0 mb-2">404</p>
                        <p class="fs-18 fw-semibold mb-3">{{ $title ?? 'Oops! Something went wrong.' }}</p>
                        <div class="row justify-content-center mb-5">
                            <div class="col-xl-6">
                                <p class="mb-0 op-7">{{ $message ?? 'The page you are looking for is not available.' }}</p>
                            </div>
                        </div>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">
                            <i class="ri-arrow-left-line align-middle me-1 d-inline-block"></i> GO BACK
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/kyc/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('assets/libs/particles.js/particles.js') }}"></script>
    <script src="{{ asset('assets/js/error.js') }}"></script>
</body>
</html>
