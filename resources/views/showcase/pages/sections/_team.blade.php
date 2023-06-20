<section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Notre équipe</h2>
            @if (isset($sectionResume) && $sectionResume->team != null)
            {!! $sectionResume->team !!}
            @endif
            {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
        </div>

        <div class="row">

            @if (!empty($teams))
            @php
            $i=1;
            @endphp
            @foreach ($teams as $team)
            <div class="col-lg-6 mb-4">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="{{ $i*100 }}">
                    {{-- <div class="pic"><img src="{{ asset('theme_assets/showcase/img/team/team-1.jpg') }}" class="img-fluid" alt=""></div> --}}
                <div class="pic"><img src="{{ asset(profilePic($team->id)->src) }}" class="img-fluid" alt="{{ profilePic($team->id)->filename }}" style="width: 169px; height: 169px;"></div>
                <div class="member-info">
                    {{-- <h4>Walter White</h4>
                            <span>Chief Executive Officer</span>
                            <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p> --}}
                    <h4>{{ $team->name }}</h4>
                    <span>{{ $team->post->wording }}</span>
                    <p>{{ $team->biography }}</p>
                    <div class="social">
                        <a href="#"><i class="ri-twitter-fill"></i></a>
                        <a href="#"><i class="ri-facebook-fill"></i></a>
                        <a href="#"><i class="ri-instagram-fill"></i></a>
                        <a href="#"> <i class="ri-skype-line"></i> </a>
                        <a href="#"> <i class="ri-linkedin-box-fill"></i> </a>
                        <a href="#"> <i class="ri-whatsapp-line"></i> </a>
                        {{-- @if ($team->twitter)
                        <a href="{{ $team->twitter }}" class="twitter"><i class="bx bxl-twitter"></i></a>
                        @endif
                        @if ($team->facebook)
                        <a href="{{ $team->facebook }}" class="facebook"><i class="bx bxl-facebook"></i></a>
                        @endif
                        @if ($team->instagram)
                        <a href="{{ $team->instagram }}" class="instagram"><i class="bx bxl-instagram"></i></a>
                        @endif
                        @if ($team->skype)
                        <a href="{{ $team->skype }}" class="google-plus"><i class="bx bxl-skype"></i></a>
                        @endif
                        @if ($team->linkedin)
                        <a href="{{ $team->linkedin }}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        @endif
                        @if ($team->whatsapp)
                        <a href="{{ $team->whatsapp }}" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
        @php
        $i++;
        @endphp
        @endforeach
        @endif

        {{-- <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
                    <div class="pic"><img src="{{ asset('theme_assets/showcase/img/team/team-2.jpg') }}" class="img-fluid" alt="">
    </div>
    <div class="member-info">
        <h4>Sarah Jhonson</h4>
        <span>Product Manager</span>
        <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
        <div class="social">
            <a href="#"><i class="ri-twitter-fill"></i></a>
            <a href="#"><i class="ri-facebook-fill"></i></a>
            <a href="#"><i class="ri-instagram-fill"></i></a>
            <a href="#"> <i class="ri-linkedin-box-fill"></i> </a>
        </div>
    </div>
    </div>
    </div> --}}

    {{-- <div class="col-lg-6 mt-4">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
                    <div class="pic"><img src="{{ asset('theme_assets/showcase/img/team/team-3.jpg') }}" class="img-fluid" alt=""></div>
    <div class="member-info">
        <h4>William Anderson</h4>
        <span>CTO</span>
        <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
        <div class="social">
            <a href="#"><i class="ri-twitter-fill"></i></a>
            <a href="#"><i class="ri-facebook-fill"></i></a>
            <a href="#"><i class="ri-instagram-fill"></i></a>
            <a href="#"> <i class="ri-linkedin-box-fill"></i> </a>
        </div>
    </div>
    </div>
    </div> --}}

    {{-- <div class="col-lg-6 mt-4">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
                    <div class="pic"><img src="{{ asset('theme_assets/showcase/img/team/team-4.jpg') }}" class="img-fluid" alt=""></div>
    <div class="member-info">
        <h4>Amanda Jepson</h4>
        <span>Accountant</span>
        <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
        <div class="social">
            <a href="#"><i class="ri-twitter-fill"></i></a>
            <a href="#"><i class="ri-facebook-fill"></i></a>
            <a href="#"><i class="ri-instagram-fill"></i></a>
            <a href="#"> <i class="ri-linkedin-box-fill"></i> </a>
        </div>
    </div>
    </div>
    </div> --}}

    </div>

    </div>
</section>
