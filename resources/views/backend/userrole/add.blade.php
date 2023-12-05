@extends('layouts.dashboard_control')

@section('content')

<div class="container-fluid mt-4 px-4">
    <div class="row mb-4">
        <form action="{{ route('users.insert') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Insert tags part -->
                <div class="col-sm-12 col-xl-7">
                    <div class="bg-light rounded h-100 p-4">
                        <p class="fs-5 fw-bold">Add New Users</p>
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingText" value="{{ old('name') }}" placeholder="Username">
                            <label for="floatingText">Username</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" value="{{ old('email') }}" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-4">
                            <div class="form-group input-group" style="border: 1px solid #ced4da; border-radius: 5px;">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword1" style="border: none;" placeholder="Password">
                                <button type="button" style="height: 52px; padding: 0 10px; background: white; border-radius: 5px; border: none;"><i id="clickit1" onclick="myFunction1();" class="fa fa-solid fa-eye" style="font-size: 20px; color: #757677;"></i></button>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <div class="form-group input-group" style="border: 1px solid #ced4da; border-radius: 5px;">
                                <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="floatingPassword2" style="border: none;" placeholder="Confirm Password">
                                <button type="button" style="height: 52px; padding: 0 10px; background: white; border-radius: 5px; border: none;"><i id="clickit2" onclick="myFunction2();" class="fa fa-solid fa-eye" style="font-size: 20px; color: #757677;"></i></button>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-primary">Add User</button>
                        </div>

                    </div>
                </div>
                <!-- Tag list table -->
                <div class="col-sm-12 col-xl-5">
                    <div class="bg-light rounded h-100 p-4">
                        <div class="mb-4">
                            <label for="role" class="form-label tw-bold">Role</label>
                            <select class="form-select" id="role" name="role">
                                <option value="user">User</option>
                                <option value="author">Author</option>
                                <option value="editor">Editor</option>
                                <option value="administrator">Administrator</option>
                            </select>
                        </div>
                    </div>

                 </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts_content')
<script>
    function myFunction1() {
        let x = document.getElementById("floatingPassword1");
        let y = document.getElementById("clickit1");
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
    function myFunction2() {
        let x = document.getElementById("floatingPassword2");
        let y = document.getElementById("clickit2");
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
@endsection
