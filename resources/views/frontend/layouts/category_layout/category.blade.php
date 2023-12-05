
<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from themeger.shop/html/katen/html/category.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 05:32:51 GMT -->
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
	<header class="header-personal">
        <div class="container-xl header-top">
			<div class="row align-items-center">

				<div class="col-4 d-none d-md-block d-lg-block">
					<!-- social icons -->
					<ul class="social-icons list-unstyled list-inline mb-0">
						<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
					</ul>
				</div>

				<div class="col-md-4 col-sm-12 col-xs-12 text-center">
				<!-- site logo -->
					<a class="navbar-brand" href="personal.html"><img style="width: 80px; border-radius: 50%;" src=" @if (isset($post))
                        {{ asset('uploads/profile') }}/{{ $post->reletionwithuser->image }}
                    @endif" alt="logo" /></a>

                    @if(isset($site->logo))
                        <a href="{{ route('home')}}" class="d-block text-logo p-1"><img src="{{ asset('uploads/sitelogo') }}/{{ $site->logo }}" alt=""></a>
                    @else
					    <a href="{{ route('home')}}" class="d-block text-logo p-1"><img src="{{ asset('frontend_assets') }}/images/logo.svg" alt=""></a>
                    @endif

					@if (isset($site->tagline))
                        <span class="slogan d-block p-2">{{ $site->tagline }}</span>
                    @else
                        <span class="slogan d-block p-2">Your tagline goes here</span>
                    @endif
				</div>

				<div class="col-md-4 col-sm-12 col-xs-12">
					<!-- header buttons -->
					<div class="header-buttons float-md-end mt-4 mt-md-0">
						<button class="search icon-button">
							<i class="icon-magnifier"></i>
						</button>
						<button class="burger-menu icon-button ms-2 float-end float-md-none">
							<span class="burger-icon"></span>
						</button>
					</div>
				</div>

			</div>
        </div>

		<nav class="navbar navbar-expand-lg">
			<div class="container-xl">

				<div class="collapse navbar-collapse justify-content-center centered-nav">
					<!-- menus -->
					<ul class="navbar-nav">
						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="{{route('home')}}">Home</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="{{route('home')}}">Magazine</a></li>
								<li><a class="dropdown-item" href="{{ route('personal')}}">Personal</a></li>
							</ul>
						</li>

						@foreach ($category as $cat)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.post', $cat->id )}}">{{ $cat->title }}</a>
                            </li>
                        @endforeach
						<li class="nav-item">
							<a class="nav-link" href="{{ route('about') }}">About Us</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('contact')}}">Contact</a>
						</li>
					</ul>
				</div>

			</div>
		</nav>
	</header>

    {{-- header ends form here --}}

    @yield('content')

	{{-- footer and sidebar starts form here --}}
    <div class="col-lg-4">

        <!-- sidebar -->
        <div class="sidebar">
            <!-- widget about -->
            <div class="widget rounded">
                <div class="widget-about data-bg-image text-center" data-bg-image="{{ asset('frontend_assets') }}/images/map-bg.png">
                    <img src="{{ asset('frontend_assets') }}/images/logo.svg" alt="logo" class="mb-4" />
                    <p class="mb-4">Hello, We’re content writer who is fascinated by content fashion, celebrity and lifestyle. We helps clients bring the right content to the right people.</p>
                    <ul class="social-icons list-unstyled list-inline mb-0">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>

            <!-- widget popular posts -->
            <div class="widget rounded">
                <div class="widget-header text-center">
                    <h3 class="widget-title">Popular Posts</h3>
                    <img src="{{ asset('frontend_assets') }}/images/wave.svg" class="wave" alt="wave" />
                </div>
                <div class="widget-content">

                    @foreach ($popular_posts as $post)
                        <!-- post -->
                        <div class="post post-list-sm circle">
                            <div class="thumb rounded">
                                <span class="number">1</span>
                                <a href="{{ route('single.post', $post->id) }}">
                                    <div class="inner">
                                        <img src="{{ asset('uploads/post') }}/{{ $post->image}}" alt="post-title" />
                                    </div>
                                </a>
                            </div>
                            <div class="details clearfix">
                                <h6 class="post-title my-0"><a href="{{ route('single.post', $post->id) }}">
                                    @php
                                        $post_title = strip_tags($post->title);
                                        if(strlen($post_title > 100)):
                                            $post_cut = substr($post_title,0,50);
                                            $endpoint = strrpos($post_cut, " ");
                                            $post_title = $endpoint?substr($post_cut,0,$endpoint):substr($post_cut,0);
                                            $post_title .=".....";
                                        endif;
                                        echo $post_title;
                                    @endphp
                                </a></h6>
                                <ul class="meta list-inline mt-1 mb-0">
                                    <li class="list-inline-item">{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</li>
                                </ul>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <!-- widget categories -->
            <div class="widget rounded">
                <div class="widget-header text-center">
                    <h3 class="widget-title">Explore Topics</h3>
                    <img src="{{ asset('frontend_assets') }}/images/wave.svg" class="wave" alt="wave" />
                </div>
                <div class="widget-content">
                    <ul class="list">

                        @foreach ($all_category as $category)
                            <li><a href="{{ route('category.post', $category->id )}}">{{ $category->title }}</a><span>({{ $category->reletionwithpost()->count() }})</span></li>
                        @endforeach

                    </ul>
                </div>

            </div>

            <!-- widget newsletter -->
            <div class="widget rounded">
                <div class="widget-header text-center">
                    <h3 class="widget-title">Newsletter</h3>
                    <img src="{{ asset('frontend_assets') }}/images/wave.svg" class="wave" alt="wave" />
                </div>
                <div class="widget-content">
                    <span class="newsletter-headline text-center mb-3">Join 70,000 subscribers!</span>
                    <form>
                        <div class="mb-2">
                            <input class="form-control w-100 text-center" placeholder="Email address…" type="email">
                        </div>
                        <button class="btn btn-default btn-full" type="submit">Sign Up</button>
                    </form>
                    <span class="newsletter-privacy text-center mt-3">By signing up, you agree to our <a href="#">Privacy Policy</a></span>
                </div>
            </div>

            <!-- widget post carousel -->
            <div class="widget rounded">
                <div class="widget-header text-center">
                    <h3 class="widget-title">Celebration</h3>
                    <img src="{{ asset('frontend_assets') }}/images/wave.svg" class="wave" alt="wave" />
                </div>
                <div class="widget-content">
                    <div class="post-carousel-widget">

                        @foreach ($popular_posts as $post)
                            <!-- post -->
                            <div class="post post-carousel">
                                <div class="thumb rounded">
                                    <a href="category.html" class="category-badge position-absolute">{{ $post->reletionwithcategory->title }}</a>
                                    <a href="{{ route('single.post', $post->id) }}">
                                        <div class="inner">
                                            <img src="{{ asset('uploads/post') }}/{{ $post->image}}" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <h5 class="post-title mb-0 mt-4"><a href="{{ route('single.post', $post->id) }}">
                                    @php
                                        $post_title = strip_tags($post->title);
                                        if(strlen($post_title > 100)):
                                            $post_cut = substr($post_title,0,50);
                                            $endpoint = strrpos($post_cut, " ");
                                            $post_title = $endpoint?substr($post_cut,0,$endpoint):substr($post_cut,0);
                                            $post_title .=".....";
                                        endif;
                                        echo $post_title;
                                    @endphp
                                </a></h5>
                                <ul class="meta list-inline mt-2 mb-0">
                                    <li class="list-inline-item"><a href="#">{{ $post->reletionwithuser->name }}</a></li>
                                    <li class="list-inline-item">{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</li>
                                </ul>
                            </div>
                        @endforeach

                    </div>
                    <!-- carousel arrows -->
                    <div class="slick-arrows-bot">
                        <button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
                        <button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
                    </div>
                </div>
            </div>

            <!-- widget advertisement -->
            <div class="widget no-container rounded text-md-center">
                <span class="ads-title">- Sponsored Ad -</span>
                <a href="#" class="widget-ads">
                    <img src="{{ asset('frontend_assets') }}/images/ads/ad-360.png" alt="Advertisement" />
                </a>
            </div>

            <!-- widget tags -->
            <div class="widget rounded">
                <div class="widget-header text-center">
                    <h3 class="widget-title">Tag Clouds</h3>
                    <img src="{{ asset('frontend_assets') }}/images/wave.svg" class="wave" alt="wave" />
                </div>
                <div class="widget-content">

                    @foreach ($tags as $tag)
                        <a href="{{ route('tag.post', $tag->id)}}" class="tag">#{{ $tag->name }}</a>
                    @endforeach

                </div>
            </div>

        </div>

    </div>

</div>

</div>
</section>

<!-- instagram feed -->
<div class="instagram">
<div class="container-xl">
<!-- button -->
<a href="#" class="btn btn-default btn-instagram">@Katen on Instagram</a>
<!-- images -->
<div class="instagram-feed d-flex flex-wrap">
    <div class="insta-item col-sm-2 col-6 col-md-2">
        <a href="#">
            <img src="{{ asset('frontend_assets') }}/images/insta/insta-1.jpg" alt="insta-title" />
        </a>
    </div>
    <div class="insta-item col-sm-2 col-6 col-md-2">
        <a href="#">
            <img src="{{ asset('frontend_assets') }}/images/insta/insta-2.jpg" alt="insta-title" />
        </a>
    </div>
    <div class="insta-item col-sm-2 col-6 col-md-2">
        <a href="#">
            <img src="{{ asset('frontend_assets') }}/images/insta/insta-3.jpg" alt="insta-title" />
        </a>
    </div>
    <div class="insta-item col-sm-2 col-6 col-md-2">
        <a href="#">
            <img src="{{ asset('frontend_assets') }}/images/insta/insta-4.jpg" alt="insta-title" />
        </a>
    </div>
    <div class="insta-item col-sm-2 col-6 col-md-2">
        <a href="#">
            <img src="{{ asset('frontend_assets') }}/images/insta/insta-5.jpg" alt="insta-title" />
        </a>
    </div>
    <div class="insta-item col-sm-2 col-6 col-md-2">
        <a href="#">
            <img src="{{ asset('frontend_assets') }}/images/insta/insta-6.jpg" alt="insta-title" />
        </a>
    </div>
</div>
</div>
</div>

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
					<li><a href="{{ route('personal')}}">Personal</a></li>
				</ul>
			</li>
            @foreach ($category2 as $cat)
                <li class="nav-item">
                    <a href="{{ route('category.post', $cat->id)}}">{{$cat->title}}</a>
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

</body>

<!-- Mirrored from themeger.shop/html/katen/html/category.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 05:32:51 GMT -->
</html>
