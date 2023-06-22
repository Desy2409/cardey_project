<footer id="footer">

    {{-- @include('showcase.pages.sections._newsletter') --}}

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 footer-contact">
                    <h3>Association CARDEY</h3>
                    @if (isset($contact) && $contact->address != null) {!! $contact->address !!} <br><br> @endif
                    <p>
                        <strong>Téléphone :</strong> {!! showFooterPhone() !!} 

                        <strong>Email :</strong> {!! showFooterEmail() !!} 
                    </p>
                </div>

                <div class="col-lg-5 col-md-6 footer-links">
                    <h4 class="">Liens utiles</h4>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="#hero">Accueil</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#about">A propos de nous</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#gallery">Gallerie</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="#faq">FAQ</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#team">Notre équipe</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                {{-- <div class="col-lg-3 col-md-6 footer-links"> --}}
                {{-- <h4>Our Services</h4> --}}
                {{-- <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                    </ul> --}}
                {{-- </div> --}}

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Nos réseaux sociaux</h4>
                    @if (isset($about) && $about->resume != null) {!! $about->resume !!} @endif
                    {{-- <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                      </div> --}}
                    @if (isset($about))
                    @if ($about->resume)
                    {!! $about->resume !!}
                    @endif
                    <div class="social-links mt-3">
                        @if ($about->twitter)
                        <a href="{{ $about->twitter }}" class="twitter"><i class="bx bxl-twitter"></i></a>
                        @endif
                        @if ($about->facebook)
                        <a href="{{ $about->facebook }}" class="facebook"><i class="bx bxl-facebook"></i></a>
                        @endif
                        @if ($about->instagram)
                        <a href="{{ $about->instagram }}" class="instagram"><i class="bx bxl-instagram"></i></a>
                        @endif
                        @if ($about->skype)
                        <a href="{{ $about->skype }}" class="google-plus"><i class="bx bxl-skype"></i></a>
                        @endif
                        @if ($about->linkedin)
                        <a href="{{ $about->linkedin }}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        @endif
                        @if ($about->whatsapp)
                        <a href="{{ $about->whatsapp }}" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; Copyright <strong><span>Association CARDEY</span></strong>. Tous droits réservés
        </div>
        <div class="credits">Made And Designed by <a href="#" class="text-decoration-none">Desy2409</a>
        </div>
    </div>
</footer>
