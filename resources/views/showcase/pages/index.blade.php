<!DOCTYPE html>
<html lang="en">



<head>
  @include('showcase.components._meta_tag')
  
  <title>Arsha Bootstrap Template - Index</title>
  
  @include('showcase.components._head_link')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('showcase.partials._navbar')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Better Solutions For Your Business</h1>
          <h2>We are team of talented designers making websites with Bootstrap</h2>
          {{-- <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div> --}}
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset('theme_assets/showcase/img/hero-img.png') }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section>
  <!-- End Hero -->

  <main id="main">

    <!-- ======= Cliens Section ======= -->
    <section id="cliens" class="cliens section-bg">
      <div class="container">

        {{-- <div class="row" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('theme_assets/showcase/img/clients/client-1.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('theme_assets/showcase/img/clients/client-2.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('theme_assets/showcase/img/clients/client-3.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('theme_assets/showcase/img/clients/client-4.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('theme_assets/showcase/img/clients/client-5.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('theme_assets/showcase/img/clients/client-6.png') }}" class="img-fluid" alt="">
          </div>

        </div> --}}

      </div>
    </section><!-- End Cliens Section -->

    <!-- ======= About Us Section ======= -->
    @include('showcase.pages.sections._about')
    <!-- End About Us Section -->
    
    <!-- ======= Why Us Section ======= -->
    {{-- @include('showcase.pages.sections._why_us') --}}
    <!-- End Why Us Section -->

    <!-- ======= Skills Section ======= -->
    {{-- @include('showcase.pages.sections._skills') --}}
    <!-- End Skills Section -->

    <!-- ======= Services Section ======= -->
    {{-- @include('showcase.pages.sections._service') --}}
    <!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Call To Action</h3>
            <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    @include('showcase.pages.sections._gallery')
    <!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    @include('showcase.pages.sections._team')
    <!-- End Team Section -->
    
    <!-- ======= Pricing Section ======= -->
    {{-- @include('showcase.pages.sections._pricing') --}}
    <!-- End Pricing Section -->
    
    <!-- ======= Frequently Asked Questions Section ======= -->
    @include('showcase.pages.sections._faq')
    <!-- End Frequently Asked Questions Section -->
    
    <!-- ======= Contact Section ======= -->
    @include('showcase.pages.sections._contact')
    <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('showcase.partials._footer')
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  @include('showcase.components._body_js_link')

</body>

</html>