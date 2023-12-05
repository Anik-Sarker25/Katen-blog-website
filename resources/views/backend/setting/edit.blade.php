@extends('layouts.dashboard_control')

@section('content')
    <!-- Profile Start -->
    <div class="container-fluid pt-4 px-4">
        <!-- Site setting part -->
        <div class="row mb-5">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('setting.edit', $bio->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <h6 class="mb-4" style="color: #757575;">Site Title</h6>
                        <div class="form-floating mb-3">
                            <input type="text" name="sitetitle" class="form-control @error('sitetitle') is-invalid @enderror" id="floatingInput"
                                placeholder="Username" value="{{ $bio->site_title }}">
                            <label for="floatingInput">Your site title goes here</label>
                            @error('sitetitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <h6 class="mb-4" style="color: #757575;">Tagline</h6>
                        <div class="form-floating mb-3">
                            <input type="text" name="tagline" class="form-control @error('tagline') is-invalid @enderror" id="floatingInput"
                                placeholder="Username" value="{{ $bio->tagline }}">
                            <label for="floatingInput">Your tagline goes here</label>
                            @error('tagline')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <h6 class="mb-4" style="color: #757575;">Site Logo</h6>
                        <div class="form-floating mb-3">
                            <input type="file" name="image" class="form-control" id="floatingInput"
                                placeholder="Image">
                            <label for="floatingInput">Site Logo</label>

                        </div>

                        <button type="submit" class="btn btn-outline-primary">Add Info</button>
                    </form>
                </div>
            </div>

        </div>





    </div>
    <!-- Profile End -->

@endsection


