
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Katen - Minimal Blog & Magazine HTML Theme</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('backend_assets') }}/img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('backend_assets') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{asset('backend_assets') }}/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="backend_assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="backend_assets/css/style.css" rel="stylesheet">
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


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h3>Sign In</h3>
                        </div>
                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <div class="form-group input-group" style="border: 1px solid #ced4da; border-radius: 5px;">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" style="border: none;" placeholder="Password">
                                    <button type="button" style="height: 52px; padding: 0 10px; background: white; border-radius: 5px; border: none;"><i id="clickit3" onclick="myFunction3();" class="fa fa-solid fa-eye" style="font-size: 20px; color: #757677;"></i></button>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <a href="javascript:volid(0)">Forgot Password</a>
                            </div>

                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        </form>

                        @if (Route::has('register'))
                        <p class="text-center mb-0">Don't have an Account? <a href="{{route('register')}}">Sign Up</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('backend_assets') }}/lib/chart/chart.min.js"></script>
    <script src="{{asset('backend_assets') }}/lib/easing/easing.min.js"></script>
    <script src="{{asset('backend_assets') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{asset('backend_assets') }}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{asset('backend_assets') }}/lib/tempusdominus/js/moment.min.js"></script>
    <script src="{{asset('backend_assets') }}/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="{{asset('backend_assets') }}/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{asset('backend_assets') }}/js/main.js"></script>
    <script>
        function myFunction3() {
            let x = document.getElementById("floatingPassword");
            let y = document.getElementById("clickit3");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            if (y.className == "fa fa-solid fa-eye") {
                y.className = "fa fa-solid fa-eye-slash";
            }else {
                y.className = "fa fa-solid fa-eye";
            }
        }
    </script>
</body>

</html>
