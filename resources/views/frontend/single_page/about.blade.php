@extends('frontend.layouts.page_layout.single_page')

@section('content')

<!-- page header -->
<section class="page-header">
    <div class="container-xl">
        <div class="text-center">
            <h1 class="mt-0 mb-2">About Us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                </ol>
            </nav>
        </div>
    </div>
</section>


<!-- section main content -->
<section class="main-content">
    <div class="container-xl">

        <div class="row gy-4">

            <div class="col-lg-8">

                <div class="page-content bordered rounded padding-30">

                    @if(isset($page->description))
                        @php
                            echo $page->description
                        @endphp
                        <hr class="my-4" />
                        <ul class="social-icons list-unstyled list-inline mb-0">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>

                    @else
                    <div class="page-content bordered rounded padding-30">

                        <img src="images/other/about.jpg" alt="Profile-image" class="rounded mb-4" />

                        <p>Hello, I’m a content writer who is fascinated by content fashion, celebrity and lifestyle. She helps clients bring the right content to the right people.</p>

                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>

                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>

                        <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>

                        <hr class="my-4" />
                        <ul class="social-icons list-unstyled list-inline mb-0">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>

                    </div>
                    @endif


                </div>

            </div>
            <div class="col-lg-4">

                <!-- sidebar -->
                <div class="sidebar">
                    <!-- widget about -->
                    <div class="widget rounded">
                        <div class="widget-about data-bg-image text-center" data-bg-image="{{ asset('frontend_assets')}}/images/map-bg.png">
                            <img src="{{ asset('frontend_assets')}}/images/logo.svg" alt="logo" class="mb-4" />
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
                            <img src="{{ asset('frontend_assets')}}/images/wave.svg" class="wave" alt="wave" />
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
                            <img src="{{ asset('frontend_assets')}}/images/wave.svg" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <ul class="list">
                                @foreach ($all_category as $cat)
                                    <li><a href="{{ route('category.post', $cat->id )}}">{{ $cat->title }}</a><span>({{ $cat->reletionwithpost()->count() }})</span></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                    <!-- widget newsletter -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Newsletter</h3>
                            <img src="{{ asset('frontend_assets')}}/images/wave.svg" class="wave" alt="wave" />
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
                            <img src="{{ asset('frontend_assets')}}/images/wave.svg" class="wave" alt="wave" />
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
                            <img src="{{ asset('frontend_assets')}}/images/ads/ad-360.png" alt="Advertisement" />
                        </a>
                    </div>

                    <!-- widget tags -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Tag Clouds</h3>
                            <img src="{{ asset('frontend_assets')}}/images/wave.svg" class="wave" alt="wave" />
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
                    <img src="{{ asset('frontend_assets')}}/images/insta/insta-1.jpg" alt="insta-title" />
                </a>
            </div>
            <div class="insta-item col-sm-2 col-6 col-md-2">
                <a href="#">
                    <img src="{{ asset('frontend_assets')}}/images/insta/insta-2.jpg" alt="insta-title" />
                </a>
            </div>
            <div class="insta-item col-sm-2 col-6 col-md-2">
                <a href="#">
                    <img src="{{ asset('frontend_assets')}}/images/insta/insta-3.jpg" alt="insta-title" />
                </a>
            </div>
            <div class="insta-item col-sm-2 col-6 col-md-2">
                <a href="#">
                    <img src="{{ asset('frontend_assets')}}/images/insta/insta-4.jpg" alt="insta-title" />
                </a>
            </div>
            <div class="insta-item col-sm-2 col-6 col-md-2">
                <a href="#">
                    <img src="{{ asset('frontend_assets')}}/images/insta/insta-5.jpg" alt="insta-title" />
                </a>
            </div>
            <div class="insta-item col-sm-2 col-6 col-md-2">
                <a href="#">
                    <img src="{{ asset('frontend_assets')}}/images/insta/insta-6.jpg" alt="insta-title" />
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
