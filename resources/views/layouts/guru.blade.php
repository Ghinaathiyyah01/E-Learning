<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>SMKS 9 Muhammadiyah</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('js/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('js/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        <div class="search-backdrop"></div>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link nav-link-lg message-toggle"><i class="far fa-envelope"></i></a>
                    </li>
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link notification-toggle nav-link-lg"><i class="far fa-bell"></i></a>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            {{-- <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"> --}}
                            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
    
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="row sidebar-brand m-2 d-flex align-items-center">
                        <div class="col-2 mr-2"><img src="img/logo/logoo.png" style="width: 40px; height: auto;"
                                alt=""></div>
                        <div class="col-9 mt-2">
                            <h6 href="index.html" class="p-0 m-0 brand-text" style="text-align: left;">SMKS 9 <br>
                                Muhammadiyah</h6>
                        </div>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">St</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Beranda</li>
                        <li class="dropdown">
                            <a href="/guru" class="nav-link"><i class="fas fa-home"></i><span>Beranda</span></a>
                        </li>
                        <li class="menu-header">Menu</li>
                        <li><a href="/guru/informasi" class="nav-item nav-link"><i class="fas fa-bullhorn"></i><span>Informasi</span></a></li>
                        <li><a href="/kalender" class="nav-item nav-link"><i class="fas fa-calendar"></i><span>Data Siswa</span></a></li>
                        <li><a href="/guru/modul" class="nav-item nav-link"><i class="fas fa-calendar"></i><span>Modul Pembelajaran</span></a></li>
                        <li><a href="/guru/ujian" class="nav-item nav-link"><i
                                    class="fas fa-book"></i><span>Ujian</span></a></li>
                        <li><a href="/guru/nilai" class="nav-item nav-link"><i
                                    class="fas fa-pencil-alt"></i><span>Nilai</span></a></li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2024 <div class="bullet"></div><a href="/">SMKS 9 Muhammadiyah</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('js/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('js/modules/popper.js') }}"></script>
    <script src="{{ asset('js/modules/tooltip.js') }}"></script>
    <script src="{{ asset('js/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/modules/moment.min.js') }}"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('js/modules/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/modules/chart.min.js') }}"></script>
    <script src="{{ asset('js/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('js/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
