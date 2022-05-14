<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PU E-Learning</title>

    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <style>
        .btn-custom {
            width: 100px !important;
        }
        .img-cursor {
            cursor: pointer;
        }
        #browseImg {
            height: 450px;
            width: 768px;
            object-fit: cover;
        }
        .img-table {
            height: 70px;
            width: 100px;
            object-fit: cover;
        }
    </style>

</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin/browse') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('assets/img/logo.png') }}">
                </div>
                <div class="sidebar-brand-text mx-3">E-Learning</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item {{ Request::is('admin/browse') || Request::is('admin/browse/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/browse') }}">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Browse</span></a>
            </li>

            {{-- <li class="nav-item {{ Request::is('admin/country') || Request::is('admin/country/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/country') }}">
                    <i class="fas fa-fw fa-flag"></i>
                    <span>Countries</span></a>
            </li> --}}

            <li class="nav-item {{ Request::is('admin/quiz') || Request::is('admin/quiz/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/quiz') }}">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Quiz</span></a>
            </li>

            <li class="nav-item {{ Request::is('admin/student') || Request::is('admin/student/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/student') }}">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Student</span></a>
            </li>

            <li class="nav-item {{ Request::is('admin/teacher') || Request::is('admin/teacher/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/teacher') }}">
                    <i class="fas fa-fw fa-chalkboard-teacher"></i>
                    <span>Teacher</span></a>
            </li>



            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600">{{ Auth::user()->name }}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                @if (\Auth::user()->id == 2)
                                <a class="dropdown-item" href="{{ url('admin/profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>

                <div class="container-fluid">

                    @yield('content')

                </div>

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SEA Countries 2020</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

    @yield('js')

</body>

</html>
