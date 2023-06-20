<section id="about" class="about">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>A propos de nous</h2>
        </div>

        <div class="row content">
            @if (isset($about))
            @if ($about->about_section_1 != null && $about->about_section_2 != null)
            <div class="col-lg-6">
                {!! $about->about_section_1 !!}
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
                {!! $about->about_section_2 !!}
            </div>
            @else
            @if ($about->about_section_1 != null && $about->about_section_2 == null)
            <div class="col-lg-12">
                {!! $about->about_section_1 !!}
            </div>
            @endif
            @if ($about->about_section_1 == null && $about->about_section_2 != null)
            <div class="col-lg-12">
                {!! $about->about_section_2 !!}
            </div>
            @endif

            @endif
            @endif

        </div>

    </div>
</section>
