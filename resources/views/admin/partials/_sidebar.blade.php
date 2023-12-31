<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            {{-- <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                <path d="M19.4,4.1l-9-4C10.1,0,9.9,0,9.6,0.1l-9,4C0.2,4.2,0,4.6,0,5s0.2,0.8,0.6,0.9l9,4C9.7,10,9.9,10,10,10s0.3,0,0.4-0.1l9-4
      C19.8,5.8,20,5.4,20,5S19.8,4.2,19.4,4.1z" />
                <path d="M10,15c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
      c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,15,10.1,15,10,15z" />
                <path d="M10,20c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
      c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,20,10.1,20,10,20z" />
            </svg> --}}
            <a href="#" class="logo me-1"><img src="{{ asset('customs/default_pics/1.svg') }}" alt="" class="img-fluid" style="border-radius: 50%; width:25%"></a>
            <span class="align-middle text-white" style="font-size: 18px;">Association CARDEY</span>
        </a>

        <ul class="sidebar-nav mt-4">
            {{-- <li class="sidebar-header">
                Pages
            </li> --}}
            {{-- <li class="sidebar-item @if (isset($indexDash)) active @endif">
                <a class="sidebar-link" href="{{ route('dash.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Tableau de bord</span>
                </a>
            </li> --}}
            <li class="sidebar-item @if (isset($indexPost)) active @endif">
                <a data-bs-target="#parameters" data-bs-toggle="collapse" class="sidebar-link @if (isset($indexPost)) active @else collapsed @endif ">
                    <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Paramètres</span>
                </a>
                <ul id="parameters" class="sidebar-dropdown list-unstyled collapse @if (isset($indexPost)) show @endif" data-bs-parent="#sidebar">
                    <li class="sidebar-item @if (isset($indexPost)) active @endif">
                        <a class="sidebar-link @if (isset($indexPost)) text-white @endif" href="{{ route('post.index') }}"><i class="align-middle" data-feather="chevron-right"></i>Poste</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item @if (isset($indexSectionResume)) active @endif">
                <a class="sidebar-link" href="{{ route('config_section.index') }}">
                    <i class="align-middle" data-feather="info"></i> <span class="align-middle">Config. titre sections</span>
                </a>
            </li>
            <li class="sidebar-item @if (isset($indexContact)) active @endif">
                <a class="sidebar-link" href="{{ route('contact.index') }}">
                    <i class="align-middle" data-feather="info"></i> <span class="align-middle">Contact</span>
                </a>
            </li>
            <li class="sidebar-item @if (isset($indexTeam)) active @endif">
                <a class="sidebar-link" href="{{ route('team.index') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Notre équipe</span>
                </a>
            </li>
            <li class="sidebar-item @if (isset($indexGallery)) active @endif">
                <a class="sidebar-link" href="{{ route('gallery.index') }}">
                    <i class="align-middle" data-feather="image"></i> <span class="align-middle">Gallerie</span>
                </a>
            </li>
            <li class="sidebar-item @if (isset($indexFaq)) active @endif">
                <a class="sidebar-link" href="{{ route('faq.index') }}">
                    <i class="align-middle" data-feather="help-circle"></i> <span class="align-middle">Foire Aux Questions</span>
                </a>
            </li>
            <li class="sidebar-item @if (isset($indexAbout)) active @endif">
                <a class="sidebar-link" href="{{ route('about.index') }}">
                    <i class="align-middle" data-feather="globe"></i> <span class="align-middle">A propos de nous</span>
                </a>
            </li>
            {{-- <li class="sidebar-item active">
                <a class="sidebar-link">
                    <i class="align-middle" data-feather="globe"></i> <span class="align-middle">Réseaux sociaux</span>
                </a>
            </li> --}}
            {{-- <li class="sidebar-item">
                <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Pages</span>
                </a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="pages-profile.html">Profile</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="pages-settings.html">Settings</a></li>
                </ul>
            </li> --}}
            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="notifications.html">
                    <i class="align-middle" data-feather="bell"></i> <span class="align-middle">Notifications</span>
                </a>
            </li> --}}
        </ul>
    </div>
</nav>
