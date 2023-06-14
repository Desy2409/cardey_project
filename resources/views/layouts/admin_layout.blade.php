<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    @include('admin.components._meta_tags')

    <title>Gobi#ONG | @yield('page-title')</title>

    @include('admin.components._head_link')

    @yield('stylesheets')
</head>


<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div class="wrapper">
        @include('admin.partials._sidebar')
        <div class="main">
            @include('admin.partials._navbar')

            <main class="content">
                <div class="container-fluid p-0">

                    <div class="row mb-2 mb-xl-3">
                        <div class="col-auto d-none d-sm-block">
                            <h3>@yield('content-title')</h3>
                        </div>

                        <div class="col-auto ms-auto text-end mt-n1">

                            {{-- <div class="dropdown me-2 d-inline-block position-relative">
                                <a class="btn btn-light bg-white shadow-sm dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                    <i class="align-middle mt-n1" data-feather="calendar"></i> Today
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <h6 class="dropdown-header">Settings</h6>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div> --}}

                            {{-- <button class="btn btn-primary shadow-sm">
                                <i class="align-middle" data-feather="filter">&nbsp;</i>
                            </button>
                            <button class="btn btn-primary shadow-sm">
                                <i class="align-middle" data-feather="refresh-cw">&nbsp;</i>
                            </button> --}}
                        </div>
                    </div>

                    @yield('page-content')

                </div>
            </main>

            @include('admin.partials._footer')
        </div>
    </div>

    @include('admin.components._body_js_link')

    {{-- @stack('scripts') --}}
    @include('custom_alerts.sweetalert')
    @include('custom_alerts.toast')

    @yield('scripts')

</body>

</html>
