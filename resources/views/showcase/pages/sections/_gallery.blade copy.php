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

        <div>
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
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
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

        </div>

        <div>
            <p class="text-center">
                NOËL POUR TOUS à Hahotoe (orphelinat Blessing)

                <span>le 24 décembre 2022, en collabation avec son équipe le père Noël a déposé de l'association CARDEY à déposé ses valises dans l'enceinte de l'orphelinat Blessing à hahotoe.</span>
                <span>Entouré de ses enfants magnifique, la magie de Noël à encore fait ses preuves en donnant le sourir à chaque enfant à travers les cadeaux et des vivres pour une magnifique fête de Noël à tous.</span>
                <span>Un moment de partage de joie, de danses qui a marqué plus de quatre vingt enfants y compris les responsables de l'orphelinat.</span><br>

                <span class="text-primary">*#NOEL POUR TOUS MERCI CARDEY ET SES PARTENAIRES *#</span>
            </p>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-4 col-md-6 portfolio-item">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/2/1_1.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>App 2</h4>
                    <p>App</p>
                    <a href="{{ asset('customs/default_pics/2/1_1.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                    {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
                </div>
            </div><br>
            <div class="col-lg-4 col-md-6 portfolio-item">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/2/1_1.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>App 2</h4>
                    <p>App</p>
                    <a href="{{ asset('customs/default_pics/2/1_1.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                    {{-- <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}
                </div>
            </div>
        </div>

        {{-- <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200"> --}}
        {{-- <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/2/1_1.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 6</h4>
                    <a href="{{ asset('customs/default_pics/2/1_1.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div> --}}
        {{-- <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/2/1_2.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 7</h4>
                    <a href="{{ asset('customs/default_pics/2/1_2.jpg') }}" data-gallery="portfolioGallery-2" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div> --}}
        {{-- <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/2/1_3.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 8</h4>
                    <a href="{{ asset('customs/default_pics/2/1_3.jpg') }}" data-gallery="portfolioGallery-2" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div> --}}

        {{-- </div> --}}
        <div>
            <p class="text-center">
                Vison Education CARDEY en milieu rural..

                Ayant pour l'un des objectifs de soutenir l'education des enfants vulnerables tout en faisant la promotion de l'excellence en milieu rural, nous nous sommes rendu à FETIGBÉ ,
                un village situé à 40kilomètre de la ville d'Atakpamé dans la region des plateaux pour partager des fournitures Scolaire à tous les éleves de l'Ecole primaire catholique de fétigbé en présence du chef du village , la comité des parents d'éleves, le directeur et les professeurs.
                Merci à tous ceux qui ont participés de près et de loin pour que cette action soit éffective. Special remerciement à notre partenaire ONG unsealthethruth.
            </p>
        </div>

        {{-- <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/3/3_1.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 9</h4>
                    <a href="{{ asset('customs/default_pics/3/3_1.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/3/3_2.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 10</h4>
                    <a href="{{ asset('customs/default_pics/3/3_2.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/3/3_3.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 11</h4>
                    <a href="{{ asset('customs/default_pics/3/3_3.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/3/3_4.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 12</h4>
                    <a href="{{ asset('customs/default_pics/3/3_4.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/3/3_5.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 13</h4>
                    <a href="{{ asset('customs/default_pics/3/3_5.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/3/3_6.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 14</h4>
                    <a href="{{ asset('customs/default_pics/3/3_6.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/3/3_7.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 15</h4>
                    <a href="{{ asset('customs/default_pics/3/3_7.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/3/3_8.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 16</h4>
                    <a href="{{ asset('customs/default_pics/3/3_8.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/3/3_9.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 17</h4>
                    <a href="{{ asset('customs/default_pics/3/3_9.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/3/3_10.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 18</h4>
                    <a href="{{ asset('customs/default_pics/3/3_10.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/3/3_11.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 19</h4>
                    <a href="{{ asset('customs/default_pics/3/3_11.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/3/3_12.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 20</h4>
                    <a href="{{ asset('customs/default_pics/3/3_12.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/3/3_13.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 21</h4>
                    <a href="{{ asset('customs/default_pics/3/3_13.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-img"><img src="{{ asset('customs/default_pics/3/3_14.jpg') }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                    <h4>Image 22</h4>
                    <a href="{{ asset('customs/default_pics/3/3_14.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-search ms-5"></i></a>
                </div>
            </div>

        </div> --}}
    </div>
</section>
