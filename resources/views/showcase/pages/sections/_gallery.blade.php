<section id="gallery" class="portfolio">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Gallerie</h2>
            @if (isset($sectionResume) && $sectionResume->gallery != null)
            {!! $sectionResume->gallery !!}
            @endif
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">Toutes les photos</li>
            {{-- <li data-filter=".filter-app">App</li> --}}
            {{-- <li data-filter=".filter-card">Card</li> --}}
            {{-- <li data-filter=".filter-web">Web</li> --}}
        </ul>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/2.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>App 1</h4>
                    {{-- <p>App</p> --}}
                    <a href="{{ asset('customs/default_pics/2.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-search ms-5"></i></a>
                    {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
                </div>
            </div>

            {{-- <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-img"><img src="{{ asset('theme_assets/showcase/img/portfolio/portfolio-2.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Web 3</h4>
                    <p>Web</p>
                    <a href="{{ asset('theme_assets/showcase/img/portfolio/portfolio-2.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-search"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
            </div> --}}

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/3.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>App 2</h4>
                    {{-- <p>App</p> --}}
                    <a href="{{ asset('customs/default_pics/3.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-search"></i></a>
                    {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/4.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>App 2</h4>
                    {{-- <p>App</p> --}}
                    <a href="{{ asset('customs/default_pics/4.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-search"></i></a>
                    {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/5.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>App 2</h4>
                    {{-- <p>App</p> --}}
                    <a href="{{ asset('customs/default_pics/5.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-search"></i></a>
                    {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/6.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>App 2</h4>
                    {{-- <p>App</p> --}}
                    <a href="{{ asset('customs/default_pics/6.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-search"></i></a>
                    {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/7.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>App 2</h4>
                    {{-- <p>App</p> --}}
                    <a href="{{ asset('customs/default_pics/7.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-search"></i></a>
                    {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/8.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>App 2</h4>
                    {{-- <p>App</p> --}}
                    <a href="{{ asset('customs/default_pics/8.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-search"></i></a>
                    {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/9.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>App 2</h4>
                    {{-- <p>App</p> --}}
                    <a href="{{ asset('customs/default_pics/9.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-search"></i></a>
                    {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/10.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>App 2</h4>
                    {{-- <p>App</p> --}}
                    <a href="{{ asset('customs/default_pics/10.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-search"></i></a>
                    {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/11.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>App 2</h4>
                    {{-- <p>App</p> --}}
                    <a href="{{ asset('customs/default_pics/11.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-search"></i></a>
                    {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/12.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>App 2</h4>
                    {{-- <p>App</p> --}}
                    <a href="{{ asset('customs/default_pics/12.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-search"></i></a>
                    {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/13.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>App 2</h4>
                    {{-- <p>App</p> --}}
                    <a href="{{ asset('customs/default_pics/13.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-search"></i></a>
                    {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/14.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>App 2</h4>
                    {{-- <p>App</p> --}}
                    <a href="{{ asset('customs/default_pics/14.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-search"></i></a>
                    {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/15.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>App 2</h4>
                    {{-- <p>App</p> --}}
                    <a href="{{ asset('customs/default_pics/15.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-search"></i></a>
                    {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
                </div>
            </div>

            {{-- <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-img"><img src="{{ asset('theme_assets/showcase/img/portfolio/portfolio-4.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Card 2</h4>
                    <p>Card</p>
                    <a href="{{ asset('theme_assets/showcase/img/portfolio/portfolio-4.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-search"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
            </div> --}}

            {{-- <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-img"><img src="{{ asset('theme_assets/showcase/img/portfolio/portfolio-5.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Web 2</h4>
                    <p>Web</p>
                    <a href="{{ asset('theme_assets/showcase/img/portfolio/portfolio-5.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-search"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
            </div> --}}

            {{-- <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('theme_assets/showcase/img/portfolio/portfolio-6.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>App 3</h4>
                    <p>App</p>
                    <a href="{{ asset('theme_assets/showcase/img/portfolio/portfolio-6.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-search"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
            </div> --}}

            {{-- <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-img"><img src="{{ asset('theme_assets/showcase/img/portfolio/portfolio-7.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Card 1</h4>
                    <p>Card</p>
                    <a href="{{ asset('theme_assets/showcase/img/portfolio/portfolio-7.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-search"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
            </div> --}}

            {{-- <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-img"><img src="{{ asset('theme_assets/showcase/img/portfolio/portfolio-8.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Card 3</h4>
                    <p>Card</p>
                    <a href="{{ asset('theme_assets/showcase/img/portfolio/portfolio-8.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-search"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
            </div> --}}

            {{-- <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-img"><img src="{{ asset('theme_assets/showcase/img/portfolio/portfolio-9.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Web 3</h4>
                    <p>Web</p>
                    <a href="{{ asset('theme_assets/showcase/img/portfolio/portfolio-9.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-search"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
            </div> --}}

        </div>

    </div>
</section>
