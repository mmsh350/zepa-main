@extends('layouts.index')
@section('title','Zepa Solutions - Pricing')
@section('content')
@section('page-css')
<style>
        .pricing-table {
            margin: 30px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .pricing-table h2 {
            text-align: center;
            color: #1a4081;
            margin-bottom: 20px;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .table th {
            background-color: #1a4081;
            color: #ffffff;
        }

        .social-icons {
            list-style: none;
            display: flex;
            gap: 15px;
            padding: 0;
        }

        .social-icons li {
            display: inline-block;
        }

        .social-icons a {
            text-decoration: none;
            color: #000;
            font-size: 24px;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: #0077b5; /* Change hover color */
        }
    </style>
@endsection
 <!-- ============== Start Hero section ========== -->
   <section class="hero d-flex flex-column justify-content-center align-items-center mt-5 pt-5" id="hero">
    <div id="particles-js"></div>
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="hero-text col-12 col-lg-5">
          <div class="row">
            <div class="col-12 ">
              <h1 class="title col-12" data-aos="fade-up" data-aos-delay="150"><span
                  class="unique-text">We offer flexible payment</span> for your Business </h1>
            </div>
            <div class="col-lg-10 col-12" data-aos="fade-up" data-aos-delay="200">
              <p>
              At Zepa, you’ll always get the best price no gimmicks, just unbeatable value every day!
              </p>
            </div>
            <div class="col-10" data-aos="fade-up" data-aos-delay="250">
              <a href="{{ route('login') }}" class="btn">Join Now</a>
              <a href="{{ URL('download-app')}}" class="btn">Download App</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-7 mx-md-auto text-center" data-aos="fade-left" data-aos-delay="100">
          <div class="hero-image">
            <div class="hero-img">
              <img class="img-fluid " alt="hero-img"
                src="{{ asset('assets/home/images/logo/orrange.png')}}">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ============== End Hero section ========== -->


 <!-- ======= start pricing airtime ======= -->

<div class="container pricing-table">
    <h2>Pricing Airtime</h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Services</th>
                <th>Affiliate</th>
                <th>Topuser</th>
                <th>API User</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>MTN Airtime</td>
                <td>% 98</td>
                <td>% 97</td>
                <td>% 96.8</td>
            </tr>
            <tr>
                <td>GLO Airtime</td>
                <td>% 97.0</td>
                <td>% 97.0</td>
                <td>% 97.0</td>
            </tr>
            <tr>
                <td>9MOBILE Airtime</td>
                <td>% 97.5</td>
                <td>% 97.5</td>
                <td>% 97.5</td>
            </tr>
            <tr>
                <td>AIRTEL Airtime</td>
                <td>% 98.5</td>
                <td>% 98.5</td>
                <td>% 98.5</td>
            </tr>
        </tbody>
    </table>
</div>
<!-- ======= end pricing airtime ======= -->


 <!-- ======= start pricing data ======= -->
<div class="container pricing-table">
    <h2>Pricing Data MTN</h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Services</th>
                <th>Affiliate</th>
                <th>Topuser</th>
                <th>API User</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>MTN SME</td>
                <td>N 267</td>
                <td>N 265</td>
                <td>N 261</td>
            </tr>
            <tr>
                <td>MTN CG</td>
                <td>N 270</td>
                <td>N 267</td>
                <td>N 265</td>
            </tr>
            <tr>
                <td>MTN GIFTING</td>
                <td>N 230</td>
                <td>N 225</td>
                <td>N 220</td>
            </tr>
            <tr>
                <td>MTN SME2</td>
                <td>N 262</td>
                <td>N 260</td>
                <td>N 268</td>
            </tr>
            <tr>
                <td>MTN COUPONS</td>
                <td>₦ 240</td>
                <td>₦ 238</td>
                <td>₦ 235</td>
            </tr>
            </tr>
        </tbody>
    </table>
</div>
<!-- ======= end pricing data======= -->



<!-- ======= start pricing data ======= -->
<div class="container pricing-table">
    <h2>Pricing Data Airtel</h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Services</th>
                <th>Affiliate</th>
                <th>Topuser</th>
                <th>API User</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Airtel SME</td>
                <td>N 225</td>
                <td>N 220</td>
                <td>N 218</td>
            </tr>
            <tr>
                <td>Airtel CG</td>
                <td>N 282</td>
                <td>N 280</td>
                <td>N 278</td>
            </tr>
        </tbody>
    </table>
</div>
<!-- ======= end pricing data======= -->

<!-- ======= start pricing data ======= -->
<div class="container pricing-table">
    <h2>Pricing Data Glo</h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Services</th>
                <th>Affiliate</th>
                <th>Topuser</th>
                <th>API User</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>GLO CG</td>
                <td>N 275</td>
                <td>N 272</td>
                <td>N 270</td>
            </tr>
        </tbody>
    </table>
</div>
<!-- ======= end pricing data======= -->


<!-- ======= start pricing data ======= -->
<div class="container pricing-table">
    <h2>Pricing Data 9mobile</h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Services</th>
                <th>Affiliate</th>
                <th>Topuser</th>
                <th>API User</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>9MOBILE CG</td>
                <td>N 160</td>
                <td>N 156</td>
                <td>N 150</td>
            </tr>
        </tbody>
    </table>
</div>
<!-- ======= end pricing data======= -->

<!-- ======= start pricing data ======= -->
<div class="container pricing-table">
    <h2>Educational Pin</h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Services</th>
                <th>Affiliate</th>
                <th>Topuser</th>
                <th>API User</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>WAEC PIN</td>
                <td>N 3900</td>
                <td>N 3850</td>
                <td>N 3800</td>
            </tr>
            <tr>
                <td>WAEC Registration</td>
                <td>N 27,500</td>
                <td>N 27,300</td>
                <td>N 27,100</td>
            </tr>
            <tr>
                <td>NECO PIN</td>
                <td>N 1300</td>
                <td>N 1280</td>
                <td>N 1250</td>
            </tr>
            <tr>
                <td>JAMB PIN</td>
                <td>N 4,700</td>
                <td>N 4,650</td>
                <td>N 4,600</td>
            </tr>
        </tbody>
    </table>
</div>
<!-- ======= end pricing data======= -->

<!-- ======= start pricing data ======= -->
<div class="container pricing-table">
    <h2>Verification price</h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Services</th>
                <th>Affiliate</th>
                <th>Topuser</th>
                <th>API User</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>NIN</td>
                <td>N 130</td>
                <td>N 125</td>
                <td>N 112</td>
            </tr>
            <tr>
                <td>BVN</td>
                <td>N 50</td>
                <td>N 45</td>
                <td>N 40</td>
            </tr>
            <tr>
                <td>Account Verification</td>
                <td>N 300</td>
                <td>N 250</td>
                <td>N 200</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
@section('page-js')

<script>
    $(document).ready(function() {
        // Add customizations or interactivity here
        $('table tr').hover(
            function() { $(this).css('background-color', '#f1f1f1'); },
            function() { $(this).css('background-color', ''); }
        );
    });
</script>

@endsection
