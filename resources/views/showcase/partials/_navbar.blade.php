<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

        <a href="#hero" class="logo me-3"><img src="{{ asset('customs/default_pics/1.png') }}" alt="" class="img-fluid" style="border-radius: 25%"></a>
        <h1 class="logo me-auto"><a href="{{ route('show.index') }}#hero">Association CARDEY</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="{{ route('show.index') }}#hero">Accueil</a></li>
                <li><a class="nav-link scrollto" href="{{ route('show.index') }}#about">A propos de nous</a></li>
                {{-- <li><a class="nav-link scrollto" href="#services">Services</a></li> --}}
                <li><a class="nav-link scrollto" href="{{ route('show.index') }}#gallery">Gallerie</a></li>
                <li><a class="nav-link scrollto" href="{{ route('show.index') }}#team">Notre équipe</a></li>
                <li><a class="nav-link scrollto" href="{{ route('show.index') }}#faq">FAQ</a></li>
                <li><a class="nav-link scrollto" href="{{ route('show.index') }}#contact">Contact</a></li>
                {{-- <li><a class="getstarted scrollto" href="#about">Get Started</a></li> --}}
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->

    </div>
</header>
