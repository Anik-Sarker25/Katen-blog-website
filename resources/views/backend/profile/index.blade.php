@extends('layouts.dashboard_control')

@section('content')
    <!-- Profile Start -->
    <div class="container-fluid pt-4 px-4">
        <!-- Image update part -->
        <div class="row mb-5">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded align-items-center p-4">
                    <div class="row">
                        <div class="col-sm-4 col-xl-2">
                            <img class="w-100 rounded" src="{{ asset('uploads/profile') }}/{{ auth()->user()->image }}" alt="image">
                        </div>
                        <div class="col-sm-8 col-xl-10">
                            <form action="{{ route('profile.image.update', auth()->id()) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h6 class="mb-4" style="color: #757575;">Update Image</h6>
                                <div class="form-floating mb-3">
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="floatingInput"
                                        placeholder="Image">
                                    <label for="floatingInput">Profile Image</label>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Update</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- tagline insert part -->
        <div class="row mb-5">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded align-items-center p-4">
                    <div class="row">
                        <div class="col-sm-12 col-xl-12">
                            <form action="{{ route('aboutinfo.insert', auth()->id()) }}" method="POST">
                                @csrf
                                <h6 class="mb-4" style="color: #757575;">About Info</h6>
                                <div class="form-floating mb-3">
                                    <textarea name="about_info" id="floatingInput" class="form-control @error('about_info') is-invalid @enderror">{{ $user->about }}</textarea>
                                    <label for="floatingInput">Info</label>
                                    @error('about_info')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Update Info</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Name update part -->
        <div class="row mb-5">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('profile.name.update', auth()->id()) }}" method="POST">
                        @csrf
                        <h6 class="mb-4" style="color: #757575;">Update Username</h6>
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput"
                                placeholder="Username">
                            <label for="floatingInput">Username</label>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Update</button>
                    </form>
                </div>
            </div>
            <!-- Email update part -->
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('profile.email.update', auth()->id()) }}" method="POST">
                        @csrf
                        <h6 class="mb-4" style="color: #757575;">Update Email</h6>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput"
                                placeholder="Email">
                            <label for="floatingInput">Email Address</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Password update part -->
        <div class="row mb-5">
            <div class="col-sm-12 col-xl-8">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4" style="color: #757575;">Update Password</h6>
                    <form action="{{ route('profile.password.update', auth()->id())}}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" id="floatingPassword"
                                placeholder="Current_password">
                            <label for="floatingPassword">Current Password</label>
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">New Password</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" name="password_confirmation" class="form-control" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Confirm Password</label>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Update</button>
                    </form>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="bg-light rounded h-100 p-4">
                    <b class="fs-4">Password Instructions</b>
                    <ul class="mt-3">
                        <li>
                            At least 8 characters long but 14 or more is better.
                        </li>
                        <li>
                            A combination of uppercase letters, lowercase letters, numbers, and symbols.
                        </li>
                        <li>
                            Significantly different from your previous passwords.
                        </li>
                        <li>
                            Easy for you to remember but difficult for others to guess. Consider using a memorable phrase like "6MonkeysRLooking^".
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!-- Profile End -->

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
@elseif (session('update_success'))
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
    title: "{{session('update_success')}}",
  });
</script>
@elseif (session('update_failed'))
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
    title: "{{session('update_failed')}}",
  });
</script>
@endif

@endsection
