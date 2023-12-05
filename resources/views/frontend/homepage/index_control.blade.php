

<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from themeger.shop/html/katen/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 05:32:38 GMT -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Katen - Minimal Blog & Magazine HTML Theme</title>
	<meta name="description" content="Katen - Minimal Blog & Magazine HTML Theme">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend_assets') }}/images/favicon.png">

	<!-- STYLES -->
	<link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/bootstrap.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/all.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/slick.css" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/simple-line-icons.css" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/style.css" type="text/css" media="all">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- preloader -->
<div id="preloader">
	<div class="book">
		<div class="inner">
			<div class="left"></div>
			<div class="middle"></div>
			<div class="right"></div>
		</div>
		<ul>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</div>

<!-- site wrapper -->
<div class="site-wrapper">

	<div class="main-overlay"></div>

	<!-- header -->
	<header class="header-default">
		<nav class="navbar navbar-expand-lg">
			<div class="container-xl">
				<!-- site logo -->
                @if (isset($site->logo))
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('uploads/sitelogo') }}/{{ $site->logo }}" alt="logo" /></a>
                @else
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('frontend_assets') }}/images/logo.svg" alt="logo" /></a>
                @endif

				<div class="collapse navbar-collapse">
					<!-- menus -->
					<ul class="navbar-nav mr-auto">
						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="{{ route('home') }}">Home</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="{{ route('home') }}">Magazine</a></li>
								<li><a class="dropdown-item" href="{{ route('personal')}}">Personal</a></li>
							</ul>
						</li>

						@foreach ($category as $cat)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.post', $cat->id )}}">{{ $cat->title }}</a>
                            </li>
                        @endforeach
						<li class="nav-item">
							<a class="nav-link" href="{{route('about')}}">About Us</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{route('contact')}}">Contact</a>
						</li>
					</ul>
				</div>

				<!-- header right section -->
				<div class="header-right">
					<!-- social icons -->
					<ul class="social-icons list-unstyled list-inline mb-0">
						<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
					</ul>
					<!-- header buttons -->
					<div class="header-buttons">
						<button class="search icon-button">
							<i class="icon-magnifier"></i>
						</button>
						<button class="burger-menu icon-button">
							<span class="burger-icon"></span>
						</button>
					</div>
				</div>
			</div>
		</nav>
	</header>
    {{-- header ends  --}}

    @yield('frontend_content')


	<!-- footer start-->
	<footer>
		<div class="container-xl">
			<div class="footer-inner">
				<div class="row d-flex align-items-center gy-4">
					<!-- copyright text -->
					<div class="col-md-4">
						<span class="copyright">© 2021 Katen. Template by ThemeGer.</span>
					</div>

					<!-- social icons -->
					<div class="col-md-4 text-center">
						<ul class="social-icons list-unstyled list-inline mb-0">
							<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
						</ul>
					</div>

					<!-- go to top button -->
					<div class="col-md-4">
						<a href="#" id="return-to-top" class="float-md-end"><i class="icon-arrow-up"></i>Back to Top</a>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div><!-- end site wrapper -->

<!-- search popup area -->
<div class="search-popup">
	<!-- close button -->
	<button type="button" class="btn-close" aria-label="Close"></button>
	<!-- content -->
	<div class="search-content">
		<div class="text-center">
			<h3 class="mb-4 mt-0">Press ESC to close</h3>
		</div>
		<!-- form -->
		<form class="d-flex search-form" action="{{route('search')}}" method="GET">
			<input class="form-control me-2" type="search" name="search_item" placeholder="Search and press enter ..." aria-label="Search">
			<button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
		</form>
	</div>
</div>

<!-- canvas menu -->
<div class="canvas-menu d-flex align-items-end flex-column">
	<!-- close button -->
	<button type="button" class="btn-close" aria-label="Close"></button>

	<!-- logo -->
	<div class="logo">
        @if (isset($site->logo))
        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('uploads/sitelogo') }}/{{ $site->logo }}" alt="logo" /></a>
        @else
        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('frontend_assets') }}/images/logo.svg" alt="logo" /></a>
        @endif
	</div>

	<!-- menu -->
	<nav>
		<ul class="vertical-menu">
			<li class="active">
				<a href="{{ route('home') }}">Home</a>
				<ul class="submenu">
					<li><a href="{{ route('home') }}">Magazine</a></li>
					<li><a href="personal.html">Personal</a></li>
					<li><a href="personal-alt.html">Personal Alt</a></li>
					<li><a href="minimal.html">Minimal</a></li>
					<li><a href="classic.html">Classic</a></li>
				</ul>
			</li>
            @foreach ($category as $cat)
                <li class="nav-item">
                    <a href="{{ route('category.post', $cat->id )}}">{{ $cat->title }}</a>
                </li>
            @endforeach
            <li class="nav-item">
                <a href="{{route('about')}}">About Us</a>
            </li>

			<li><a href="{{ route('contact') }}">Contact</a></li>
		</ul>
	</nav>

	<!-- social icons -->
	<ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
		<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
		<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
		<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
		<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
		<li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
		<li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
	</ul>
</div>

<!-- JAVA SCRIPTS -->
<script src="{{ asset('frontend_assets') }}/js/jquery.min.js"></script>
<script src="{{ asset('frontend_assets') }}/js/popper.min.js"></script>
<script src="{{ asset('frontend_assets') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('frontend_assets') }}/js/slick.min.js"></script>
<script src="{{ asset('frontend_assets') }}/js/jquery.sticky-sidebar.min.js"></script>
<script src="{{ asset('frontend_assets') }}/js/custom.js"></script>

{{-- sweet alart --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@yield('scripts_content')

</body>

<!-- Mirrored from themeger.shop/html/katen/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 05:32:47 GMT -->
</html>
