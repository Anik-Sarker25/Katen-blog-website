
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Katen - Minimal Blog & Magazine HTML Theme</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('backend_assets') }}/img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    {{-- ckeeditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>


    <!-- Libraries Stylesheet -->
    <link href="{{ asset('backend_assets') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('backend_assets') }}/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('backend_assets') }}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('backend_assets') }}/css/style.css" rel="stylesheet">
    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 350px;
        }
    </style>

</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><img style="width: 24px;" src="{{ asset('backend_assets') }}/img/favicon.png" alt="logo-image"></i>KATEN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('uploads/profile') }}/{{ auth()->user()->image }}" alt="image" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                        <span>{{ auth()->user()->role }}</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{route('dashboard')}}" class="nav-item nav-link {{ (\Request::route()->getName() == 'dashboard') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{route('message')}}" class="nav-item nav-link {{ (\Request::route()->getName() == 'message') ? 'active' : '' }}"><i class="fa-solid fa-message me-2"></i></i>Messages</a>
                    <a href="{{route('comments')}}" class="nav-item nav-link {{ (\Request::route()->getName() == 'comments') ? 'active' : '' }}"><i class="fa fa-comments me-2"></i>Comments</a>
                    <a href="{{route('profile')}}" class="nav-item nav-link {{ (\Request::route()->getName() == 'profile') ? 'active' : '' }}"><i class="fa-solid fa-user me-2"></i>Profile</a>
                    <a target="_blank" href="{{route('home')}}" class="nav-item nav-link {{ (\Request::route()->getName() == 'home') ? 'active' : '' }}"><i class="fa-solid fa-globe me-2"></i></i></i>Visite Site</a>


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-note-sticky me-2"></i>Posts</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('posts') }}" class="dropdown-item {{ (\Request::route()->getName() == 'posts') ? 'active' : '' }}">All Posts</a>
                            <a href="{{ route('posts.add.view') }}" class="dropdown-item {{ (\Request::route()->getName() == 'posts.add.view') ? 'active' : '' }}">Add New</a>
                            <a href="{{route('tags')}}" class="dropdown-item {{ (\Request::route()->getName() == 'tags') ? 'active' : '' }}">Tags</a>
                            <a href="{{route('categories')}}" class="dropdown-item {{ (\Request::route()->getName() == 'categories') ? 'active' : '' }}">Categories</a>

                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-file me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('pages') }}" class="dropdown-item {{ (\Request::route()->getName() == 'pages') ? 'active' : '' }}">All Page</a>
                            <a href="{{ route('pages.add.view') }}" class="dropdown-item {{ (\Request::route()->getName() == 'pages.add.view') ? 'active' : '' }}">Add New</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-users me-2"></i>Users</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('users') }}" class="dropdown-item {{ (\Request::route()->getName() == 'users') ? 'active' : '' }}">All Users</a>
                            <a href="{{ route('users.add.view') }}" class="dropdown-item {{ (\Request::route()->getName() == 'users.add.view') ? 'active' : '' }}">Add New</a>
                        </div>
                    </div>

                    <a href="{{route('setting')}}" class="nav-item nav-link {{ (\Request::route()->getName() == 'setting') ? 'active' : '' }}"><i class="fa-solid fa-gears me-2"></i>Setting</a>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                {{-- <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form> --}}
                <div class="navbar-nav align-items-center ms-auto">

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{ asset('uploads/profile') }}/{{ auth()->user()->image }}" alt="image" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{ auth()->user()->name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="javascript:volid(0)" class="dropdown-item">{{ auth()->user()->email }}</a>
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                {{-- <a href="{{route('logout')}}" class="dropdown-item">Log Out</a> --}}
                                <button type="submit" class="dropdown-item" >Log Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!--Header or Navbar End -->

            @yield('content')

            <!-- Footer Start -->
            {{-- <div class="container-fluid footer pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; 2000 - 2023, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <a class="border-bottom ms-2" href="javascript:volid(0)" target="_self">Privacy Policy</a>

                            <a class="border-bottom ms-2" href="javascript:volid(0)" target="_self">Cookies Policy</a>

                            <a class="border-bottom ms-2" href="javascript:volid(0)" target="_self">Terms of Use</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend_assets') }}/lib/chart/chart.min.js"></script>
    <script src="{{ asset('backend_assets') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('backend_assets') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('backend_assets') }}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('backend_assets') }}/lib/tempusdominus/js/moment.min.js"></script>
    <script src="{{ asset('backend_assets') }}/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="{{ asset('backend_assets') }}/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('backend_assets') }}/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('scripts_content')
</body>

</html>
