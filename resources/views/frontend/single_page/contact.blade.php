@extends('frontend.layouts.page_layout.single_page')

@section('content')

<!-- page header -->
<section class="page-header">
    <div class="container-xl">
        <div class="text-center">
            <h1 class="mt-0 mb-2">Contact</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- section main content -->
<section class="main-content">
    <div class="container-xl">

        <div class="row">

            <div class="col-md-4">
                <!-- contact info item -->
                <div class="contact-item bordered rounded d-flex align-items-center">
                    <span class="icon icon-phone"></span>
                    <div class="details">
                        <h3 class="mb-0 mt-0">Phone</h3>
                        <p class="mb-0">+1-202-555-0135</p>
                    </div>
                </div>
                <div class="spacer d-md-none d-lg-none" data-height="30"></div>
            </div>

            <div class="col-md-4">
                <!-- contact info item -->
                <div class="contact-item bordered rounded d-flex align-items-center">
                    <span class="icon icon-envelope-open"></span>
                    <div class="details">
                        <h3 class="mb-0 mt-0">E-Mail</h3>
                        <p class="mb-0">hello@example.com</p>
                    </div>
                </div>
                <div class="spacer d-md-none d-lg-none" data-height="30"></div>
            </div>

            <div class="col-md-4">
                <!-- contact info item -->
                <div class="contact-item bordered rounded d-flex align-items-center">
                    <span class="icon icon-map"></span>
                    <div class="details">
                        <h3 class="mb-0 mt-0">Location</h3>
                        <p class="mb-0">California, USA</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="spacer" data-height="50"></div>

        <!-- section header -->
        <div class="section-header">
            <h3 class="section-title">Send Message</h3>
            <img src="{{ asset('frontend_assets') }}/images/wave.svg" class="wave" alt="wave" />
        </div>

        <!-- Contact Form -->
        <form action="{{ route('contact.insert') }}" id="contact-form" method="POST">
            @csrf
            <div class="messages"></div>

            <div class="row">
                <div class="column col-md-6">
                    <!-- Name input -->
                    <div class="form-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Your name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="column col-md-6">
                    <!-- Email input -->
                    <div class="form-group">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email address">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="column col-md-12">
                    <!-- Email input -->
                    <div class="form-group">
                        <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" placeholder="Subject">
                        @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="column col-md-12">
                    <!-- Message textarea -->
                    <div class="form-group">
                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="4" placeholder="Your message here..."></textarea>
                        @error('message')
                            <span class="invalid-feedback" role="alert">
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

            <button type="submit" class="btn btn-default">Submit Message</button><!-- Send Button -->

        </form>
        <!-- Contact Form end -->
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


@section('scripts_content')
@if (session('insert_success'))
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
        title: "{{session('insert_success')}}",
      });
    </script>

@endif

@endsection

