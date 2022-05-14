<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>E-Learning System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('assets/img/favicon.png' ) }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
        rel="stylesheet">

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <style>
        .logo-icon {
            float: left;
            background: url("{{ url('assets/img/logo.png') }}") no-repeat;
            height: 50px;
            width: 50px;
        }
        .imgBrowse {
            height: 450px;
            width: 768px;
            object-fit: cover;
        }
    </style>

</head>

<body>

    <header id="header" class="fixed-top header-t">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-xl-11 d-flex align-items-center">
                    <img src="{{ asset('assets/img/logo.png') }}" class="mr-2" alt="logo">
                    <h1 class="logo mr-auto">
                        <a href="{{ url('/') }}">E-Learning</a>
                    </h1>

                     <!-- Navigation-->

                        <nav class="nav-menu navbar-expand-lg" id="mainNav">
                            <div class="container">
                                {{-- <a class="navbar-brand" href="#page-top">Start Bootstrap</a> --}}
                                <button class="navbar-toggler  text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                    {{-- Menu --}}
                                    <i class="fas fa-bars"></i>
                                    {{-- <span class="navbar-toggler-icon"></span> --}}
                                </button>
                                <div class="collapse navbar-collapse" id="navbarResponsive">
                                    <ul class="navbar-nav ms-auto">
                                        <li class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                                        <li class="nav-item nav-link {{ Request::is('browse') || Request::is('browse/*') ? 'active' : '' }}"><a href="{{ url('/browse') }}">Browse</a></li>
                                        <li class="nav-item nav-link {{ Request::is('quiz') || Request::is('quiz/*') ? 'active' : '' }}"><a href="{{ url('/quiz') }}">Quiz</a></li>
                                        @guest
                                            <li class="nav-item nav-link {{ Request::is('login') ? 'active' : '' }}"><a href="{{ url('/login') }}">Login</a></li>
                                        @else
                                            <li class="nav-item nav-link"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        @endguest
                                    </ul>
                                </div>
                            </div>
                        </nav>

                    {{-- <nav class="nav-menu">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynav">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="mynav">
                            <ul>
                                <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                                <li class="{{ Request::is('browse') || Request::is('browse/*') ? 'active' : '' }}"><a href="{{ url('/browse') }}">Browse</a></li>
                                <li class="{{ Request::is('quiz') || Request::is('quiz/*') ? 'active' : '' }}"><a href="{{ url('admin/quiz') }}">Quiz</a></li>
                                @guest
                                    <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="{{ url('/login') }}">Login</a></li>
                                @else
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endguest
                            </ul>
                        </div>

                    </nav> --}}
                </div>
            </div>

        </div>
    </header>

    @yield('content')

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        window.addEventListener('DOMContentLoaded', event => {

// Navbar shrink function
var navbarShrink = function () {
    const navbarCollapsible = document.body.querySelector('#mainNav');
    if (!navbarCollapsible) {
        return;
    }
    if (window.scrollY === 0) {
        navbarCollapsible.classList.remove('navbar-shrink')
    } else {
        navbarCollapsible.classList.add('navbar-shrink')
    }

};

// Shrink the navbar
navbarShrink();

// Shrink the navbar when page is scrolled
document.addEventListener('scroll', navbarShrink);

// Activate Bootstrap scrollspy on the main nav element
const mainNav = document.body.querySelector('#mainNav');
if (mainNav) {
    new bootstrap.ScrollSpy(document.body, {
        target: '#mainNav',
        offset: 72,
    });
};

// Collapse responsive navbar when toggler is visible
const navbarToggler = document.body.querySelector('.navbar-toggler');
const responsiveNavItems = [].slice.call(
    document.querySelectorAll('#navbarResponsive .nav-link')
);
responsiveNavItems.map(function (responsiveNavItem) {
    responsiveNavItem.addEventListener('click', () => {
        if (window.getComputedStyle(navbarToggler).display !== 'none') {
            navbarToggler.click();
        }
    });
});

});
    </script>

    @yield('js')

</body>

</html>
