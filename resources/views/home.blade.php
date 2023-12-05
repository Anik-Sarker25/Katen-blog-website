@extends('frontend.homepage.index_control')


@section('frontend_content')

	<!-- hero section -->
	<section id="hero">

		<div class="container-xl">

			<div class="row gy-4">

				<div class="col-lg-8">

				@if ($featured_posts)
                    	<!-- featured post large -->
                    					<div class="post featured-post-lg">
                    						<div class="details clearfix">
                    							<a href="{{ route('category.post', $featured_posts->reletionwithcategory->id)}}" class="category-badge">{{$featured_posts->reletionwithcategory->title}}</a>
                    							<h2 class="post-title"><a href="{{ route('single.post', $featured_posts->id) }}">{{ $featured_posts->title}}</a></h2>
                    							<ul class="meta list-inline mb-0">
                    								<li class="list-inline-item"><a href="#">{{ $featured_posts->reletionwithuser->name}}</a></li>
                    								<li class="list-inline-item">{{ \Carbon\Carbon::parse($featured_posts->created_at)->format('d M Y') }}</li>
                    							</ul>
                    						</div>
                    						<a href="blog-single.html">
                    							<div class="thumb rounded">
                    								<div class="inner data-bg-image" data-bg-image="{{ asset('uploads/post') }}/{{ $featured_posts->image }}"></div>
                    							</div>
                    						</a>
                    					</div>
                @endif

				</div>

				<div class="col-lg-4">

					<!-- post tabs -->
					<div class="post-tabs rounded bordered">
						<!-- tab navs -->
						<ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
							<li class="nav-item" role="presentation"><button aria-controls="popular" aria-selected="true" class="nav-link active" data-bs-target="#popular" data-bs-toggle="tab" id="popular-tab" role="tab" type="button">Popular</button></li>
							<li class="nav-item" role="presentation"><button aria-controls="recent" aria-selected="false" class="nav-link" data-bs-target="#recent" data-bs-toggle="tab" id="recent-tab" role="tab" type="button">Recent</button></li>
						</ul>
						<!-- tab contents -->
						<div class="tab-content" id="postsTabContent">
							<!-- loader -->
							<div class="lds-dual-ring"></div>
							<!-- popular posts -->
							<div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular" role="tabpanel">

								@foreach ($popular_posts as $post)
                                    <!-- post -->
                                    <div class="post post-list-sm circle">
                                        <div class="thumb rounded">
                                            <a href="{{ route('single.post', $post->id) }}">
                                                <div class="inner">
                                                    <img src="{{ asset('uploads/post') }}/{{ $post->image }}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="{{ route('single.post', $post->id) }}">
                                                {{-- {{ $post->title }} --}}
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
							<!-- recent posts -->
							<div aria-labelledby="recent-tab" class="tab-pane fade" id="recent" role="tabpanel">

								@foreach ($recent_posts as $post)
                                    <!-- post -->
                                    <div class="post post-list-sm circle">
                                        <div class="thumb rounded">
                                            <a href="{{ route('single.post', $post->id) }}">
                                                <div class="inner">
                                                    <img src="{{ asset('uploads/post') }}/{{ $post->image }}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="{{ route('single.post', $post->id) }}">
                                                {{-- {{ $post->title }} --}}
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
					</div>
				</div>

			</div>

		</div>

	</section>

	<!-- section main content -->
	<section class="main-content">
		<div class="container-xl">

			<div class="row gy-4">

				<div class="col-lg-8">

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Recent Post </h3>
						<img src="{{ asset('frontend_assets') }}/images/wave.svg" class="wave" alt="wave" />
					</div>

					<div class="padding-30 rounded bordered">
						<div class="row gy-5">
							<div class="col-sm-6">
								<!-- post -->
								<div class="post">
									<div class="thumb rounded">
										<a href="{{ route('category.post', $specific_cat->id )}}" class="category-badge position-absolute">{{ $specific_cat->title}}</a>
										<span class="post-format">
											<i class="icon-picture"></i>
										</span>
										<a href="{{ route('single.post', $post->id) }}">
											<div class="inner">
												<img src="{{ asset('uploads/post') }}/{{ $specific_cat->reletionwithpost->image }}" alt="post-title" />
											</div>
										</a>
									</div>
									<ul class="meta list-inline mt-4 mb-0">
										<li class="list-inline-item"><a href="#"><img style="width: 24px; border-radius: 50%;" src="{{ asset('uploads/profile') }}/{{ $featured_posts->reletionwithuser->image }}" class="author" alt="author"/>{{ $featured_posts->reletionwithuser->name }}</a></li>
										<li class="list-inline-item">{{ \Carbon\Carbon::parse($specific_cat->reletionwithpost->created_at)->format('d M Y') }}</li>
									</ul>
									<h5 class="post-title mb-3 mt-3">
                                        <a href="{{ route('single.post', $post->id) }}">
                                            {{-- {{ $post->title }} --}}
                                            @php
                                            $post_title = strip_tags($specific_cat->reletionwithpost->title);
                                            if(strlen($post_title > 100)):
                                                $post_cut = substr($post_title,0,50);
                                                $endpoint = strrpos($post_cut, " ");
                                                $post_title = $endpoint?substr($post_cut,0,$endpoint):substr($post_cut,0);
                                                $post_title .=".....";
                                            endif;
                                            echo $post_title;
                                            @endphp
                                        </a>
                                    </h5>
									<p class="excerpt mb-0">
                                        @php
                                        $post_des = strip_tags($specific_cat->reletionwithpost->description);
                                        if(strlen($post_des > 200)):
                                            $post_cut = substr($post_des,0,100);
                                            $endpoint = strrpos($post_cut, " ");
                                            $post_des = $endpoint?substr($post_cut,0,$endpoint):substr($post_cut,0);
                                            $post_des .=".....";
                                        endif;
                                            echo $post_des;
                                        @endphp
                                    </p>
								</div>
							</div>
							<div class="col-sm-6">

                                    @foreach ($recent_posts as $post)
                                        <!-- post -->
                                        <div class="post post-list-sm square">
                                            <div class="thumb rounded">
                                                <a href="{{ route('single.post', $post->id) }}">
                                                    <div class="inner">
                                                        <img src="{{ asset('uploads/post') }}/{{ $post->image}}" alt="post-title" />
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details clearfix">
                                                <h6 class="post-title my-0">
                                                    <a href="{{ route('single.post', $post->id) }}">
                                                        {{-- {{ $post->title }} --}}
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
                                                    </a>
                                                </h6>
                                                <ul class="meta list-inline mt-1 mb-0">
                                                    <li class="list-inline-item">{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach


							</div>
						</div>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- horizontal ads -->
					<div class="ads-horizontal text-md-center">
						<span class="ads-title">- Sponsored Ad -</span>
						<a href="#">
							<img src="{{ asset('frontend_assets') }}/images/ads/ad-750.png" alt="Advertisement" />
						</a>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Trending</h3>
						<img src="{{ asset('frontend_assets') }}/images/wave.svg" class="wave" alt="wave" />
					</div>

					<div class="padding-30 rounded bordered">
						<div class="row gy-5">
							<div class="col-sm-6">
								<!-- post -->
								<div class="post">
									<div class="thumb rounded">
										<a href="{{ route('category.post', $specific_cat1->id )}}" class="category-badge position-absolute">{{ $specific_cat1->title}}</a>
										<span class="post-format">
											<i class="icon-picture"></i>
										</span>
										<a href="{{ route('single.post', $specific_cat1->reletionwithpost->id) }}">
											<div class="inner">
												<img src="{{ asset('uploads/post') }}/{{ $specific_cat1->reletionwithpost->image }}" alt="post-title" />
											</div>
										</a>
									</div>
									<ul class="meta list-inline mt-4 mb-0">
										<li class="list-inline-item"><a href="#"><img style="width: 24px; border-radius: 50%;" src="{{ asset('uploads/profile') }}/{{ $featured_posts->reletionwithuser->image }}" class="author" alt="author"/>{{ $featured_posts->reletionwithuser->name }}</a></li>
										<li class="list-inline-item">{{ \Carbon\Carbon::parse($specific_cat1->reletionwithpost->created_at)->format('d M Y') }}</li>
									</ul>
									<h5 class="post-title mb-3 mt-3">
                                        <a href="{{ route('single.post', $post->id) }}">
                                            {{-- {{ $post->title }} --}}
                                            @php
                                            $post_title = strip_tags($specific_cat1->reletionwithpost->title);
                                            if(strlen($post_title > 100)):
                                                $post_cut = substr($post_title,0,50);
                                                $endpoint = strrpos($post_cut, " ");
                                                $post_title = $endpoint?substr($post_cut,0,$endpoint):substr($post_cut,0);
                                                $post_title .=".....";
                                            endif;
                                            echo $post_title;
                                            @endphp
                                        </a>
                                    </h5>
									<p class="excerpt mb-0">
                                        @php
                                        $post_des = strip_tags($specific_cat1->reletionwithpost->description);
                                        if(strlen($post_des > 200)):
                                            $post_cut = substr($post_des,0,100);
                                            $endpoint = strrpos($post_cut, " ");
                                            $post_des = $endpoint?substr($post_cut,0,$endpoint):substr($post_cut,0);
                                            $post_des .=".....";
                                        endif;
                                            echo $post_des;
                                        @endphp
                                    </p>
								</div>

								@foreach ($posts as $post)
                                    <!-- post -->
                                    <div class="post post-list-sm square before-seperator">
                                        <div class="thumb rounded">
                                            <a href="{{ route('single.post', $post->id) }}">
                                                <div class="inner">
                                                    <img src="{{ asset('uploads/post') }}/{{ $post->image }}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0">
                                                <a href="{{ route('single.post', $post->id) }}">
                                                    {{-- {{ $post->title }} --}}
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
                                                </a>
                                            </h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach

							</div>
							<div class="col-sm-6">
								<!-- post -->
								<div class="post">
									<div class="thumb rounded">
										<a href="{{ route('category.post', $specific_cat->id )}}" class="category-badge position-absolute">{{ $specific_cat->title}}</a>
										<span class="post-format">
											<i class="icon-picture"></i>
										</span>
										<a href="{{ route('single.post', $specific_cat->reletionwithpost->id) }}">
											<div class="inner">
												<img src="{{ asset('uploads/post') }}/{{ $specific_cat->reletionwithpost->image }}" alt="post-title" />
											</div>
										</a>
									</div>
									<ul class="meta list-inline mt-4 mb-0">
										<li class="list-inline-item"><a href="#"><img style="width: 24px; border-radius: 50%;" src="{{ asset('uploads/profile') }}/{{ $featured_posts->reletionwithuser->image }}" class="author" alt="author"/>{{ $featured_posts->reletionwithuser->name }}</a></li>
										<li class="list-inline-item">{{ \Carbon\Carbon::parse($specific_cat->reletionwithpost->created_at)->format('d M Y') }}</li>
									</ul>
									<h5 class="post-title mb-3 mt-3">
                                        <a href="{{ route('single.post', $post->id) }}">
                                            {{-- {{ $post->title }} --}}
                                            @php
                                            $post_title = strip_tags($specific_cat->reletionwithpost->title);
                                            if(strlen($post_title > 100)):
                                                $post_cut = substr($post_title,0,50);
                                                $endpoint = strrpos($post_cut, " ");
                                                $post_title = $endpoint?substr($post_cut,0,$endpoint):substr($post_cut,0);
                                                $post_title .=".....";
                                            endif;
                                            echo $post_title;
                                            @endphp
                                        </a>
                                    </h5>
									<p class="excerpt mb-0">
                                        @php
                                        $post_des = strip_tags($specific_cat->reletionwithpost->description);
                                        if(strlen($post_des > 200)):
                                            $post_cut = substr($post_des,0,100);
                                            $endpoint = strrpos($post_cut, " ");
                                            $post_des = $endpoint?substr($post_cut,0,$endpoint):substr($post_cut,0);
                                            $post_des .=".....";
                                        endif;
                                            echo $post_des;
                                        @endphp
                                    </p>
								</div>

                                @foreach ($posts as $post)
                                    <!-- post -->
                                    <div class="post post-list-sm square before-seperator">
                                        <div class="thumb rounded">
                                            <a href="{{ route('single.post', $post->id) }}">
                                                <div class="inner">
                                                    <img src="{{ asset('uploads/post') }}/{{ $post->image }}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0">
                                                <a href="{{ route('single.post', $post->id) }}">
                                                    {{-- {{ $post->title }} --}}
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
                                                </a>
                                            </h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
							</div>
						</div>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Inspiration</h3>
						<img src="{{ asset('frontend_assets') }}/images/wave.svg" class="wave" alt="wave" />
						<div class="slick-arrows-top">
							<button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
							<button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
						</div>
					</div>

					<div class="row post-carousel-twoCol post-carousel">

						@foreach ($featured_posts2 as $post)
                            <!-- post -->
                            <div class="post post-over-content col-md-6">
                                <div class="details clearfix">
                                    <a href="{{ route('category.post', $post->reletionwithcategory->id )}}" class="category-badge">{{ $post->reletionwithcategory->title}}</a>
                                    <h4 class="post-title">
                                        <a href="{{ route('single.post', $post->id) }}">
                                            {{-- {{ $post->title }} --}}
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
                                        </a>
                                    </h4>
                                    <ul class="meta list-inline mb-0">
                                        <li class="list-inline-item"><a href="#">{{ $post->reletionwithuser->name }}</a></li>
                                        <li class="list-inline-item">{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</li>
                                    </ul>
                                </div>
                                <a href="blog-single.html">
                                    <div class="thumb rounded">
                                        <div class="inner">
                                            <img src="{{ asset('uploads/post') }}/{{ $post->image}}" alt="thumb" />
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Latest Posts</h3>
						<img src="{{ asset('frontend_assets') }}/images/wave.svg" class="wave" alt="wave" />
					</div>

					<div class="padding-30 rounded bordered">

						<div class="row">

							@foreach ($trending as $post)
                                <div class="col-md-12 col-sm-6">
                                    <!-- post -->
                                    <div class="post post-list clearfix">
                                        <div class="thumb rounded">
                                            <span class="post-format-sm">
                                                <i class="icon-picture"></i>
                                            </span>
                                            <a href="{{ route('single.post', $post->id) }}">
                                                <div class="inner">
                                                    <img src="{{ asset('uploads/post') }}/{{ $post->image }}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details">
                                            <ul class="meta list-inline mb-3">
                                                <li class="list-inline-item"><a href="#"><img src="{{ asset('frontend_assets') }}/images/other/author-sm.png" class="author" alt="author"/>{{ $post->reletionwithuser->name }}</a></li>
                                                <li class="list-inline-item"><a href="{{ route('category.post', $post->reletionwithcategory->id )}}">{{ $post->reletionwithcategory->title}}</a></li>
                                                <li class="list-inline-item">{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</li>
                                            </ul>
                                            <h5 class="post-title">
                                                <a href="{{ route('single.post', $post->id) }}">
                                                    {{-- {{ $post->title }} --}}
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
                                                </a>
                                            </h5>
                                            <p class="excerpt mb-0">
                                                @php
                                                $post_des = strip_tags($post->description);
                                                if(strlen($post_des > 200)):
                                                    $post_cut = substr($post_des,0,100);
                                                    $endpoint = strrpos($post_cut, " ");
                                                    $post_des = $endpoint?substr($post_cut,0,$endpoint):substr($post_cut,0);
                                                    $post_des .=".....";
                                                endif;
                                                    echo $post_des;
                                                @endphp
                                            </p>
                                            <div class="post-bottom clearfix d-flex align-items-center">
                                                <div class="social-share me-auto">
                                                    <button class="toggle-button icon-share"></button>
                                                    <ul class="icons list-unstyled list-inline mb-0">
                                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="more-button float-end">
                                                    <a href="{{ route('single.post', $post->id) }}"><span class="icon-options"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach



						</div
						>
						<!-- load more button -->
						<div class="text-center">
							<button class="btn btn-simple">Load More</button>
						</div>

					</div>

				</div>
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

                                    @foreach ($categories as $cat)
                                        <li><a href="{{ route('category.post', $cat->id )}}">{{ $cat->title }}</a><span>({{ $cat->reletionwithpost()->count() }})</span></li>
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

@endsection
