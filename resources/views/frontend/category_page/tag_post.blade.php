@extends('frontend.layouts.category_layout.category')

@section('content')

<section class="page-header">
    <div class="container-xl">
        <div class="text-center text-capitalize">
            <h1 class="mt-0 mb-2">{{ $tags_name->name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $tags_name->name }}</li>
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
                    <div class="row gy-4">
                        @forelse ($tag_posts as $post)
                            <div class="col-sm-6">
                                <!-- post -->
                                <div class="post post-grid rounded bordered">
                                    <div class="thumb top-rounded">
                                        <a href="category.html" class="category-badge position-absolute">{{ $post->reletionwithcategory->title }}</a>
                                        <span class="post-format">
                                            <i class="icon-picture"></i>
                                        </span>
                                        <a href="{{ route('single.post', $post->id) }}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/post')}}/{{ $post->image }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details">
                                        <ul class="meta list-inline mb-0">
                                            <li class="list-inline-item"><a href="#"><img style="width: 24px; border-radius: 50%;" src="{{ asset('uploads/profile') }}/{{ $post->reletionwithuser->image }}" class="author" alt="author"/>{{ $post->reletionwithuser->name }}</a></li>
                                            <li class="list-inline-item">{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</li>
                                        </ul>
                                        <h5 class="post-title mb-3 mt-3"><a href="{{ route('single.post', $post->id) }}">
                                            @php
                                            $post_title = strip_tags($post->title);
                                            if(strlen($post_title > 100)):
                                                $post_cut = substr($post_title,0,60);
                                                $endpoint = strrpos($post_cut, " ");
                                                $post_title = $endpoint?substr($post_cut,0,$endpoint):substr($post_cut,0);
                                                $post_title .=".....";
                                            endif;
                                            echo $post_title;
                                        @endphp
                                        </a></h5>
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
                                    </div>
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
                        @empty
                        <p class="text-center text-danger">SORRY, THIS TAG HAVE NO POSTS!</p>
                        @endforelse

                    </div>
                    <div class="paginate-sec" >
                        {{ $tag_posts->links() }}
                    </div>

                {{-- <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">1</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                    </ul>
                </nav> --}}

            </div>


@endsection
