@extends('frontend.layouts.single_post_layout.single_post')

@section('content')

<div class="col-lg-8">
    <!-- post single -->
    <div class="post post-single">
        <!-- post header -->
        <div class="post-header">
            <h1 class="title mt-0 mb-3">{{ $single_post->title }}</h1>
            <ul class="meta list-inline mb-0">
                <li class="list-inline-item"><a href="#"><img style="width: 36px; border-radius: 50%;" src="{{ asset('uploads/profile') }}/{{ $single_post->reletionwithuser->image }}" class="author" alt="author"/>{{ $single_post->reletionwithuser->name }}</a></li>
                <li class="list-inline-item"><a href="{{ route('category.post', $single_post->reletionwithcategory->id )}}">{{ $single_post->reletionwithcategory->title }}</a></li>
                <li class="list-inline-item">{{ \Carbon\Carbon::parse($single_post->created_at)->format('d M Y') }}</li>
            </ul>
        </div>
        <!-- featured image -->
        <div class="featured-image">
            <img src="{{ asset('uploads/post') }}/{{ $single_post->image }}" alt="post-title" />
        </div>
        <!-- post content -->
        <div class="post-content clearfix">
            {{-- {{ $single_post->description }} --}}
            @php
                echo $single_post->description;
            @endphp
        </div>
        <!-- post bottom section -->
        <div class="post-bottom">
            <div class="row d-flex align-items-center">
                <div class="col-md-6 col-12 text-center text-md-start">

                    @foreach ($single_post->reletionwithtags as $tag)
                        <!-- tags -->
                        <a href="{{ route('tag.post', $tag->id)}}" class="tag">#{{ $tag->name }}</a>
                    @endforeach

                </div>
                <div class="col-md-6 col-12">
                    <!-- social icons -->
                    <ul class="social-icons list-unstyled list-inline mb-0 float-md-end">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <div class="spacer" data-height="50"></div>

    <div class="about-author padding-30 rounded">
        <div class="thumb">
            <img src="{{ asset('uploads/profile') }}/{{ $single_post->reletionwithuser->image }}" alt="{{ $single_post->reletionwithuser->name }}" />
        </div>
        <div class="details">
            <h4 class="name"><a href="#">{{ $single_post->reletionwithuser->name }}</a></h4>
            <p>{{ $single_post->reletionwithuser->about }}</p>
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
    </div>

    <div class="spacer" data-height="50"></div>

    <!-- section header -->
    <div class="section-header">
        <h3 class="section-title">
            @if (isset($comments))
            Comments ({{$comments->count()}})
            @else
            Comments
            @endif

        </h3>
        <img src="{{ asset('frontend_assets') }}/images/wave.svg" class="wave" alt="wave" />
    </div>
    <!-- post comments -->
    <div class="comments bordered padding-30 rounded">

        @if (isset($comments))
            <ul class="comments">

                @forelse ($comments as $comment)
                    <!-- comment item -->
                    <li class="comment rounded">
                        <div class="thumb">
                            <img style="width: 64px;" src="{{ Avatar::create("$comment->name")->toBase64() }}" alt="John Doe" />
                        </div>
                        <div class="details">
                            <h4 class="name"><a href="#">{{ $comment->name }}</a></h4>
                            <span class="date">{{ \Carbon\Carbon::parse($comment->created_at)->format('d M Y') }} {{ \Carbon\Carbon::parse($comment->created_at)->format("h:i a") }}</span>
                            <p>
                                {{ $comment->message }}
                            </p>
                            <a href="#reply" id="{{ $comment->id }}" onclick="Reply(event);chenge();" class="btn btn-default btn-sm">Reply</a>
                        </div>
                    </li>

                    @foreach ($comment->reletionwithreply as $reply)
                        <!-- reply item -->
                        <li class="comment child rounded"style="margin-left: 90px;">
                            <div class="thumb">
                                <img style="width: 64px;" src="{{ Avatar::create("$reply->name")->toBase64() }}" alt="John Doe" />
                            </div>
                            <div class="details">
                                <h4 class="name"><a href="#">{{ $reply->name }}</a></h4>
                                <span class="date">{{ \Carbon\Carbon::parse($reply->created_at)->format('d M Y') }} {{ \Carbon\Carbon::parse($reply->created_at)->format("h:i a") }}</span>
                                <p>
                                    {{ $reply->message }}
                                </p>
                                <a href="#reply" id="{{ $reply->id }}" onclick="Reply(event);chenge();" class="btn btn-default btn-sm">Reply</a>
                            </div>
                        </li>
                        @foreach ($reply->reletionwithreply as $lastreplay)
                        <!-- reply item -->
                        <li class="comment child rounded" style="margin-left: 180px;">
                            <div class="thumb">
                                <img style="width: 64px;" src="{{ Avatar::create("$lastreplay->name")->toBase64() }}" alt="John Doe" />
                            </div>
                            <div class="details">
                                <h4 class="name"><a href="#">{{ $lastreplay->name }}</a></h4>
                                <span class="date">{{ \Carbon\Carbon::parse($lastreplay->created_at)->format('d M Y') }} {{ \Carbon\Carbon::parse($lastreplay->created_at)->format("h:i a") }}</span>
                                <p>
                                    {{ $lastreplay->message }}
                                </p>
                                {{-- <a href="#reply" id="{{ $lastreplay->id }}" onclick="Reply(event);chenge();" class="btn btn-default btn-sm">Reply</a> --}}
                            </div>
                        </li>
                        @endforeach
                    @endforeach
                @empty
                <li class="text-center p-4">No comments yet!</li>

                @endforelse


            </ul>
        @else
        <ul>
            <li class="text-center p-4">Comment not passed yet!</li>
        </ul>

        @endif


        <div id="reply"></div>
    </div>

    <div class="spacer" data-height="50"></div>

    <!-- section header -->
    <div class="section-header">
        <h3 id="change" class="section-title">Leave Comment</h3>
        <img src="{{ asset('frontend_assets') }}/images/wave.svg" class="wave" alt="wave" />
    </div>
    <!-- comment form -->
    <div class="comment-form rounded bordered padding-30">

        <form action="{{ route('comment')}}" id="comment-form" class="comment-form" method="POST">
            @csrf
            <div class="messages"></div>

            <div class="row">

                <div class="column col-md-12">
                    <!-- Comment textarea -->
                    <div class="form-group">
                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="InputComment" rows="4" placeholder="Your comment here..."></textarea>
                        @error('message')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="column col-md-6">
                    <!-- Email input -->
                    <div class="form-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="inputname"  placeholder="Username">
                        @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <input type="hidden" name="post_id" class="form-control" value="{{ $single_post->id }}">
                    <input type="hidden" name="parent_id" id="pushid" class="form-control" value="">
                </div>

                <div class="column col-md-6">
                    <!-- Name input -->
                    <div class="form-group">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="inputemail" placeholder="Email Address">
                        @error('email')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="column col-md-12 mb-4">
                    {!! NoCaptcha::display() !!}
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                        </span>
                    @endif
                </div>

            </div>

            <button type="submit" class="btn btn-default">Submit</button><!-- Submit Button -->

        </form>
    </div>
</div>

@endsection

@section('scripts_content')
@if (session('comment_success'))
    <script>
        const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "success",
        title: "{{session('comment_success')}}",
      });
    </script>

@endif
<script>

    function chenge() {
        document.getElementById("change").innerHTML = "Leave a Reply";
    }
    let pushid = document.querySelector('#pushid');
    function Reply(event) {
        pushid.value = event.target.getAttribute('id');
    }

</script>

@endsection




