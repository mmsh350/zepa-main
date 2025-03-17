@extends('layouts.index')
@section('title','Zepa Solutions - Contact Us')
@section('content')
<section class="hero d-flex flex-column justify-content-center align-items-center mt-5 pt-5" id="hero">
    <div id="particles-js"></div>
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="hero-text col-12 col-lg-5">
          <div class="row">
            <div class="col-12 ">
              <h1 class="title col-12" data-aos="fade-up" data-aos-delay="150">Our Staff is <span
                  class="unique-text">always available </span> to address your complaints. </h1>
            </div>
            <div class="col-lg-10 col-12" data-aos="fade-up" data-aos-delay="200">
              <p>
              Feel free to contact us anytime—we're available 24/7 to assist you.
              </p>
            </div>
            <div class="col-10" data-aos="fade-up" data-aos-delay="250">
              <a href="https://wa.me/+2347011604559" class="btn">Chart us</a>
              <a href="{{ URL('download-app')}}" class="btn">download App</a>
            </div>
          </div>
        </div>
        <div class="col-10 col-lg-6 mx-md-auto text-center" data-aos="fade-left" data-aos-delay="80">
          <div class="hero-image">
            <div class="hero-img">
              <img class="img-fluid " alt="hero-img"
                src="{{ asset('assets/home/images/logo/IMG_2615.PNG')}}">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ============== End Hero section ========== -->

  <!-- Start Contact Section -->
  <section class="container contact py-5" id="contact">
    <div class="heading">
      <h4 class="pretitle" data-aos="fade-up">Contact</h4>
      <h1 class="title col-12" data-aos="fade-up" data-aos-delay="100">Contact Us for Any Questions</h1>
      <p class="col-lg-7 col-12" data-aos="fade-up" data-aos-delay="150">
        We encourage you to reach out to our support team with any questions you may have.
      </p>
    </div>

    <div class="row gx-4">
      <!-- Contact Info Section -->
      <div class="col-12 col-lg-6 gy-3">
        <h2 class="title-2" data-aos="fade-right" data-aos-delay="200">Contact Info :</h2>

        <div class="info d-flex my-4" data-aos="fade-right" data-aos-delay="250">
          <h5><i class="bi bi-envelope-fill mx-4"></i>user.guide@zepasolutions.com</h5>
        </div>
        <div class="info d-flex my-4" data-aos="fade-up" data-aos-delay="300">
          <h5><i class="bi bi-phone-fill mx-4"></i>+2347011604559</h5>
          </div>
        <div class="info d-flex my-4" data-aos="fade-up" data-aos-delay="400">
        <h5>
        <a href="https://www.facebook.com/profile.php?id=61563505366382&mibextid=ZbWKwL" target="_blank">
      <i class="bi bi-facebook mx-4"></i>@zepa wallet</a>
    </div>
        <div class="info d-flex my-4" data-aos="fade-up" data-aos-delay="400"><h5>
        <a href="https://wa.me/+2347011604559" target="_blank">
      <i class="bi bi-whatsapp mx-4"></i>+2347011604559
    </a>
  </h5>
</div>

        </div>
         <!--End  Contact Info Section -->

      <!-- Contact Form Section -->
      <div class="col-12 col-lg-6">
        <form class="main-form" id="contact-us-form" action="#" method="post">
          <div class="row g-3 mb-1">
            <div class="col-lg-6 col-12" data-aos="fade-right" data-aos-delay="200">
              <input placeholder="Name" type="text" id="name" name="name" required class="text-input">
            </div>
            <div class="col-lg-6 col-12" data-aos="fade-left" data-aos-delay="200">
              <input placeholder="Subject" type="text" id="subject" name="subject" required class="text-input">
            </div>
          </div>

          <div class="col-12" data-aos="fade-up" data-aos-delay="250">
            <input placeholder="Email" type="email" id="email" name="email" required class="text-input my-2">
          </div>
          <div class="col-12" data-aos="fade-up" data-aos-delay="300">
            <textarea placeholder="Message" class="text-input my-2" rows="7" id="message" name="message" required></textarea>
          </div>

          <div class="col-12" data-aos="fade-up" data-aos-delay="350">
            <button type="submit" class="btn">Send Now</button>
          </div>
        </form>
      </div>
    </div>
  </section>

@endsection
