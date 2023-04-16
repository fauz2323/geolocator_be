<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>GELOCATOR</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist.min.css') }}">
    <link href="{{ asset('asset/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ route('home') }}" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('ico.png') }}" alt="">
                <img class="logo-compact" src="{{ asset('ico.png') }}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar text-primary">
                                Hallo, {{ Auth::user()->name }} Selamat Datang...
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    <img src="{{ asset('icona.png') }}" width="20" alt="" />

                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @if (Auth::user()->hasRole('user'))
                                        <a href="{{ route('profile') }}" class="dropdown-item ai-icon">
                                            <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                                width="18" height="18" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            <span class="ml-2">Profile </span>
                                        </a>
                                    @endif

                                    <a href="{{ route('logout') }}" class="dropdown-item ai-icon"
                                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                            width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12">
                                            </line>
                                        </svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">

                <ul class="metismenu" id="menu">
                    <li><a href="{{ route('home') }}" class="ai-icon" aria-expanded="false">
                            <i class="fa-solid fa-house"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    @if (Auth::user()->hasRole('user'))
                        <li><a href="{{ route('profile') }}" class="ai-icon" aria-expanded="false">
                                <i class="fa-solid fa-gear"></i>
                                <span class="nav-text">Profile</span>
                            </a>
                        </li>
                    @else
                        {{-- admin --}}
                        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="fa-solid fa-user"></i>
                                <span class="nav-text">Akun Faskes</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ route('index-user') }}">List Akun Faskes</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                                <span class="nav-text">Faskes</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ route('index-kategory') }}">Kategori</a></li>
                                <li><a href="{{ route('index-faskes') }}">Fasilitas Kesehatan</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('profile') }}" class="ai-icon" aria-expanded="false">
                                <i class="fa-solid fa-gear"></i>
                                <span class="nav-text">Profile</span>
                            </a>
                        </li>
                    @endif

                </ul>
                <div class="copyright">
                    <p><strong>...</strong> © 2022 All Rights Reserved</p>
                </div>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <!-- Add Order -->
                @if (Session::has('success'))
                    <p class="alert alert-info">{{ Session::get('success') }}</p>
                @endif
                @if (Session::has('err'))
                    <p class="alert alert-danger">{{ Session::get('err') }}</p>
                @endif
                @yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Dibuat Oleh Athiya Faradila</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('asset/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('asset/js/custom.min.js') }}"></script>
    <script src="{{ asset('asset/js/deznav-init.js') }}"></script>
    <script src="{{ asset('asset/vendor/owl-carousel/owl.carousel.js') }}"></script>

    <!-- Chart piety plugin files -->

    <!-- Apex Chart -->

    <!-- Dashboard 1 -->
    <script src="{{ asset('asset/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset/js/plugins-init/datatables.init.js') }}"></script>
    @stack('script')

</body>

</html>
