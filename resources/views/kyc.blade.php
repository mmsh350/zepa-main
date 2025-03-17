<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Meta Data -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Easy Verifications for your Business"/>
    <meta name="keywords" content="NIMC, BVN, ZEPA, Verification, Airtime,Bills, Identity">
    <meta name="author" content="Zepa Developers">
    <title>ZEPA Solutions - KYC Verification</title> 

    <!-- fav icon -->
    <link rel="icon" href="{{ asset('assets/home/images/favicon/favicon.png') }}" type="image/x-icon">

    <!-- BASE CSS -->
    <link href="{{ asset('assets/kyc/css/bootstrap.min.css')}}" rel="stylesheet">
	  <link href="{{ asset('assets/kyc/css/menu.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/kyc/css/style.css')}}" rel="stylesheet">
	  <link href="{{ asset('assets/kyc/css/vendors.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('assets/kyc/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom2.css') }}" rel="stylesheet">
	
	  <!-- MODERNIZR MENU -->
	  <script src="{{ asset('assets/kyc/js/modernizr.js') }}"></script>
    <script src="{{ asset('assets/kyc/js/webcam.min.js') }}"></script>
</head>
<body>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div><!-- /Preload -->
	
	<div id="loader_form">
		<div data-loader="circle-side-2"></div>
	</div><!-- /loader_form -->

	<!-- /menu -->
	
	<div class="container-fluid full-height">
		<div class="row row-height">
			<div class="col-lg-6 content-left">
				<div class="content-left-wrapper">
					<a href="../" id="logo"><img src="{{ asset('assets/kyc/img/logo.png')}}" alt="" width="49" height="35"></a>
					<!-- /social -->
					<div>
						<figure><img src="{{ asset('assets/kyc/img/kyc-img.png')}}" alt="" class="img-fluid"></figure>
						<h2>Verify Your Identity</h2>
						<p class="custom_text5">Help us get to know you better! Completing the verification process will allow us to tailor our services to your needs and provide a more personalized experience. Let's get started! <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </p>
                
               <form method="POST" action="{{ route('logout') }}">
                @csrf 
                    <div class="custom_text10">
                            <button type="submit" class="btn btn-outline-danger btn-wave waves-effect waves-light">Logout</button>
                    </div>
                </form>  
              </div>
					<div class="copy">© {{ date('Y') }} Zepa Solutions. @lang('All rights reserved.')

                    </div>
				</div>
				<!-- /content-left-wrapper -->
			</div>
			<!-- /content-left -->

	<div class="col-lg-6 content-right" >
				
    <form id="signUpForm" method="POST" >
        <!-- start step indicators -->
        <div class="form-header d-flex mb-3">
            <span class="stepIndicator">Step 1</span>
            <span class="stepIndicator">Step 2</span>
            <span class="stepIndicator">Step 3</span>
        </div>
        <!-- end step indicators -->
    
        <!-- step one -->
        <div class="step">
             <div class="alert alert-info alert-dismissible text-center" role="alert">
                 <small> Please provide your details below. Note that accurate information is required, as it will be verified before proceeding. Ensure the details you enter are correct to avoid any delays or issues with the verification process.</small>
            </div>
            <div class="mb-3">
                <input type="text" placeholder="First Name" name="First_Name">
            </div>
			      <div class="mb-3">
                <input type="text" placeholder="Middle Name"  name="Middle_Name">
            </div>
			      <div class="mb-3">
                <input type="text" placeholder="Last Name"  name="Last_Name">
            </div>
            <div class="row">
            <small id="lbdob" class="text-danger">Provide your date of birth (MM/DD/YYY)</small>
                  <div class="mb-3 col-md-6">
                      <input type="date" placeholder="Date of Birth" id="dob" name="Date_Of_Birth">
                  </div>
                  <div class="mb-3 col-md-6">
                      <input type="text" placeholder="Phone Number" maxlength="11"  name="Phone_Number">
                  </div>
                   <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            </div>
        </div>
    
        <!-- step two -->
        <div class="step">
           <div class="alert alert-info alert-dismissible text-center" role="alert">
                 <small>Please provide your details below. Note that accurate information is required, as it will be verified before proceeding. Ensure the details you enter are correct to avoid any delays or issues with the verification process.</small>
            </div>
		    <div class="row">
				<div class="mb-3 col-md-5">
					<select  name="Identity_Type">
						<option value="">Identity Type</option>
            <option value="BVN">BVN</option>
					</select>
				</div>
				<div class="mb-3 col-md-7">
					<input type="text" placeholder="BVN Number" maxlength="11"  name="Identity_Number">
				</div>
			 </div>
        </div>
    
        <!-- step three -->
        <div class="step">
             <div class="alert alert-info alert-dismissible text-center" role="alert">
                 <small id="message">Please provide your details below. Note that accurate information is required, as it will be verified before proceeding. Ensure the details you enter are correct to avoid any delays or issues with the verification process.</small>
            </div>	<center>
            <div class="mb-3 col-md-6" >
				 
              <div id = "preview" style="margin-bottom:15px; width:150px; height:150px;">
                <img src="{{ asset('assets/images/upload.jpg') }}"  class="img-fluid rounded" id="img" style="width:150px; height:150px;">
              </div>
              <div style="margin-top:5px; margin-bottom:50px;"> 
                <a href="#" id="photoUpload" type="button" class="btn btn-outline-secondary btn-wave waves-effect waves-light" data-bs-toggle="modal"
                      data-bs-target="#imageUpload">Upload Photo</a>
              </div>  
			     </div>
            <input type="text" name="User_Photo" hidden class="image-tag">
			</center>
        </div>
    
        <!-- start previous / next buttons -->
        <div class="form-footer d-flex">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
        <!-- end previous / next buttons -->
    </form>
			<!-- /content-right-->
		</div>
		<!-- /row-->
	</div>
	<!-- /container-fluid -->

	 
                                      <div class="modal fade" id="imageUpload">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                              
                                                <div class="modal-body text-center mt-4 mb-4">
                                                  
                                                    <div class="upload-btn-wrapper"> 
                                                          <button type="button" class="btn-wrapper" id="disk">
                                                              <i class="fa fa-upload"></i> Gallery
                                                          </button> 	 
                                                          <input accept="image/*" type='file' id="photo" src="" class="form-control"/>
                                                    </div>

                                                   <div class="upload-btn-wrapper ">  
                                                          <button type="button" id="webcam_Capture" class="btn-wrapper">
                                                               <i class="fa fa-camera"></i> Webcam
                                                          </button>
                                                   </div>

                                                   <div id="webcam" style="display:none">
                                                        <div class="row">
                                                            <div class="col-md-12 ">
                                                               <div class="webcam-container">
                                                                <div id="my_webcam" style="margin-left:-10px;"></div>
                                                                 </div>
                                                                <br/>
                                                                <center>
                                                                <input type="button" class="custom_button" value="Take Snapshot" onClick="take_snapshot()">
                                                                </center>
                                                            </div>
                                                        </div>
                                                   </div>
                                                    
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
	
	
	
	<!-- COMMON SCRIPTS -->
	<script src="{{ asset('assets/kyc/js/jquery-3.7.1.min.js')}}"></script>
  <script src="{{ asset('assets/kyc/js/common_scripts.min.js')}}"></script>
	<script src="{{ asset('assets/kyc/js/velocity.min.js')}}"></script>
	<script src="{{ asset('assets/kyc/js/functions.js')}}"></script>
	<script src="{{ asset('assets/js/photo.js')}}"></script>
  <script src="{{ asset('assets/js/custom2.js')}}"></script>
</body>
</html>