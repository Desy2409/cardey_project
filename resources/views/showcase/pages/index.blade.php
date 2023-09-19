<!DOCTYPE html>
<html lang="en">



<head>
  @include('showcase.components._meta_tag')
  
  <title>Accueil | CARDEY</title>
  
  @include('showcase.components._head_link')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('showcase.partials._navbar')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="background: #B1785E;">

    <div class="container">
      <div class="row mt-3">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          {{-- <h1>Better Solutions For Your Business</h1> --}}
          <h2>@if (isset($sectionResume) && ($sectionResume->home_first_title != null)) {{ $sectionResume->home_first_title }} @else  @endif</h2>
          <h2>@if (isset($sectionResume) && ($sectionResume->home_second_title != null)) {{ $sectionResume->home_second_title }} @else  @endif</h2>
          {{-- <h2>We are team of talented designers making websites with Bootstrap</h2> --}}
        </div>
        <div class="col-lg-2 order-1 order-lg-2">
        </div>
        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          {{-- <img src="{{ asset('theme_assets/showcase/img/hero-img.png') }}" class="img-fluid animated" alt=""> --}}
          {{-- <img src="{{ asset('customs/default_pics/13.jpg') }}" class="img-fluid animated" alt="" style="width: 80%; height: 90%; border-radius: 25%"> --}}
          <img src="{{ asset('customs/default_pics/1.jpg') }}" class="img-fluid animated" alt="" style="width: 80%; height: 90%; border-radius: 25%">
        </div>
      </div>
    </div>

  </section>
  <!-- End Hero -->

  <main id="main">

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
    {{-- @include('showcase.pages.sections._cta') --}}
    <!-- End Cta Section -->

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
  <a href="{{ route('show.index') }}#hero" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  @include('showcase.components._body_js_link')

  @include('showcase.components._custom_body_js_link')

</body>

</html>