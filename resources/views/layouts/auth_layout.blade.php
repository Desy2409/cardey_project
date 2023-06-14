<!DOCTYPE html>
<html lang="en-US" dir="ltr">



<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Gobi#ONG | @yield('page-title')</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    {{-- <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('theme_assets/auth/img/favicons/apple-touch-icon.png') }}"> --}}
    {{-- <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('theme_assets/auth/img/favicons/favicon-32x32.png') }}"> --}}
    {{-- <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('theme_assets/auth/img/favicons/favicon-16x16.png') }}"> --}}
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('theme_assets/auth/img/favicons/favicon.ico') }}"> --}}
    <link rel="manifest" href="{{ asset('theme_assets/auth/img/favicons/manifest.json') }}">
    {{-- <meta name="msapplication-TileImage" content="{{ asset('theme_assets/auth/img/favicons/mstile-150x150.png') }}"> --}}
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('theme_assets/auth/vendors/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('theme_assets/auth/vendors/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('theme_assets/auth/js/config.js') }}"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('theme_assets/auth/vendors/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('theme_assets/auth/css/line.css') }}">
    <link href="{{ asset('theme_assets/auth/css/theme-rtl.min.css') }}" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('theme_assets/auth/css/theme.min.css') }}" type="text/css" rel="stylesheet" id="style-default">
    <link href="{{ asset('theme_assets/auth/css/user-rtl.min.css') }}" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('theme_assets/auth/css/user.min.css') }}" type="text/css" rel="stylesheet" id="user-style-default">
    <script>
        var phoenixIsRTL = window.config.config.phoenixIsRTL;
        if (phoenixIsRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }

    </script>

<link href="{{ asset('customs/css/style.css') }}" type="text/css" rel="stylesheet">
</head>

<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container-fluid px-0" data-layout="container">
            <div class="container-fluid">
                <div class="bg-holder bg-auth-card-overlay" style="background-image:url({{ asset('theme_assets/auth/img/bg/37.png') }});"></div>
                <!--/.bg-holder-->
                <div class="row flex-center position-relative min-vh-100 g-0 py-5">
                    <div class="col-11 col-sm-10 col-xl-8">
                        <div class="card border border-300 auth-card">
                            <div class="card-body pe-md-0">
                                @yield('page-content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('theme_assets/auth/vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('theme_assets/auth/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme_assets/auth/vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('theme_assets/auth/vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('theme_assets/auth/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('theme_assets/auth/vendors/lodash/lodash.min.js') }}"></script>
    {{-- <script src="../../../../../../polyfill.io/v3/polyfill.min58be.js?features=window.scroll"></script> --}}
    <script src="{{ asset('theme_assets/auth/vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('theme_assets/auth/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('theme_assets/auth/vendors/dayjs/dayjs.min.js') }}"></script>
    <script src="{{ asset('theme_assets/auth/js/phoenix.js') }}"></script>
</body>

</html>
