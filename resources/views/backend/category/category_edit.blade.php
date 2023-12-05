@extends('layouts.dashboard_control')

@section('content')

    <div class="container-fluid mt-4 px-4">
        <div class="row mb-4">
            <!-- Insert tags part -->
            <div class="col-sm-12 col-xl-4">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('categories.edit', $categories->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <p class="fs-5 fw-bold">Update Category</p>
                            <label for="floatingInput" class="form-label fw-bold">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput" value="{{ $categories->title }}">
                            <p class="m-2 fst-italic">The name is how it appears on your site.</p>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="floatingInput3" class="form-label fw-bold">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="floatingInput3">
                            <p class="m-2 fst-italic">The Image is how it appears on your site.</p>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="floatingInput2" class="form-label fw-bold">Slug</label>
                            <input type="text" name="slug" class="form-control" id="floatingInput2" value="{{ $categories->slug }}">
                            <p class="m-2 fst-italic">The "Slug" is the URL friendly version of the Name. It is useally all lowercase and contain only letters, numbers and hyphens.</p>

                        </div>
                        <div class="w-100 text-end">
                            <button type="submit" class="btn btn-outline-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
             <!-- Tag list table -->
            <div class="col-sm-12 col-xl-8">

            </div>
        </div>
    </div>
@endsection



