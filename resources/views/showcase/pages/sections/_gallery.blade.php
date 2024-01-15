<section id="gallery" class="portfolio">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Gallerie</h2>
            @if (isset($sectionResume) && $sectionResume->gallery != null)
                {!! $sectionResume->gallery !!}
            @endif
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
            {{-- <li data-filter="*" class="filter-active">Toutes les photos</li> --}}
            {{-- <li data-filter=".filter-app">App</li> --}}
            {{-- <li data-filter=".filter-card">Card</li> --}}
            {{-- <li data-filter=".filter-web">Web</li> --}}
        </ul>

        @if (!empty($galleries) && sizeof($galleries) > 0)
            @foreach ($galleries as $gallery)
                <div class="mb-3">
                    {{-- <p class="text-center"> --}}
                    {!! $gallery->text_message !!}
                    {{-- </p> --}}
                </div>
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @if (!empty($gallery->fileUploads) && sizeof($gallery->fileUploads) > 0)
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($gallery->fileUploads as $file)
                            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                <div class="portfolio-img"><img src="{{ asset($file->src) }}" class="img-fluid" alt=""></div>
                                <div class="portfolio-info">
                                    <h4>Image {{ $i++ }}</h4>
                                    <a href="{{ asset($file->src) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            @endforeach
        @endif

        {{-- <div>
            <p class="text-center">
                🎁 NOËL POUR TOUS 🎄

                <span>😃 Retour sur images de la journée du 23 Décembre 2021. 🎉Un moment spécial de partages avec les chaleureux enfants du village 🏠 ADOUGBELAN (Préfecture de l'OGOU).</span>
                <span>Une journée ✨ aucours de laquelle la magie 🎄de Noël a une fois encore permis de célébrer les enfants et de faire germer plus de joie dans leurs coeurs 😊</span><br>
                <span>▪️Merci à tous ceux qui ont contribué de par leurs présences et aux autorités de la place</span><br>
                <span>▪️Merci à tous ces enfants pour le retour en amour </span><br>
                <span>▪️Merci CARDEY</span><br>
                <span class="text-primary">
                    #noel #kidparty #noelpourtous #cadeau #joyeuxnoel #atakpame #ogou #togo #ong #association #cardey
                </span>
            </p>
        </div> --}}

        {{-- <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/1/1_5.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 5</h4>
                    <a href="{{ asset('customs/default_pics/1/1_5.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/1/1_1.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 1</h4>
                    <a href="{{ asset('customs/default_pics/1/1_1.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/1/1_2.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 2</h4>
                    <a href="{{ asset('customs/default_pics/1/1_2.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/1/1_3.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 3</h4>
                    <a href="{{ asset('customs/default_pics/1/1_3.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/1/1_4.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 4</h4>
                    <a href="{{ asset('customs/default_pics/1/1_4.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div>

        </div> --}}

    </div>
</section>
