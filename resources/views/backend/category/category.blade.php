@extends('layouts.dashboard_control')

@section('content')

    <div class="container-fluid mt-4 px-4">
        <div class="row mb-4">
            <!-- Insert tags part -->
            <div class="col-sm-12 col-xl-4">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('categories.insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <p class="fs-5 fw-bold">Add New Category</p>
                            <label for="floatingInput" class="form-label fw-bold">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput" value="{{ old('name') }}">
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
                            <input type="text" name="slug" class="form-control" id="floatingInput2" value="{{ old('name') }}">
                            <p class="m-2 fst-italic">The "Slug" is the URL friendly version of the Name. It is useally all lowercase and contain only letters, numbers and hyphens.</p>

                        </div>
                        <div class="w-100 text-end">
                            <button type="submit" class="btn btn-outline-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
             <!-- Tag list table -->
            <div class="col-sm-12 col-xl-8">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between mb-2">
                        <h6 style="color: #757575;" class="fs-5 fw-bold">Categories</h6>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash-arrow-up me-2"></i>Restore</button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                            <div class="modal-content" style="background: #F3F6F9;">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Deleted Categories</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Slug</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Restore</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($trashed as $trash)
                                                    <tr>
                                                        <th scope="row">{{ $trash->id }}</th>
                                                        <td>
                                                            <img style="width: 50px; border-radius: 5px;" src="{{asset('uploads/category')}}/{{ $trash->image }}" alt="image">
                                                        </td>
                                                        <td>{{ $trash->title }}</td>
                                                        <td>{{ $trash->slug }}</td>
                                                        <td>
                                                            @if ($trash->status == 'active')
                                                            <button type="submit" class="btn btn-outline-success">{{ $trash->status}}</button>
                                                            @else
                                                            <button type="submit" class="btn btn-outline-danger">{{ $trash->status}}</button>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('categories.restore',$trash->id) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-outline-primary">Restore</button>
                                                            </form>

                                                        </td>
                                                        <td>
                                                            <form action="{{ route('categories.force_delete',$trash->id) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-danger text-center">DELETED TAG LIST IS EMPTY!</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                    </div>
                    <div class="table-responsive" style="height: 455px;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($categories as $category)
                                    <tr>
                                        <th scope="row">{{$categories->firstItem() + $loop->index}}</th>
                                        <td>
                                            <img style="width: 50px; border-radius: 5px;" src="{{asset('uploads/category')}}/{{ $category->image }}" alt="image">
                                        </td>
                                        <td>
                                            <textarea name="" style="background: transparent; padding: 12px;" id="" readonly cols="15" rows="1">{{ $category->title }}</textarea>
                                        </td>
                                        <td>
                                            <textarea name="" id="" style="background: transparent; padding: 12px;" readonly cols="15" rows="1">{{ $category->slug }}</textarea>
                                        </td>
                                        <td>
                                            @if ($category->status == 'active')
                                                <form action="{{ route('categories.status', $category->id)}}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-success">{{ $category->status }}</button>
                                                </form>
                                            @else
                                            <form action="{{ route('categories.status', $category->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger">{{ $category->status }}</button>
                                            </form>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('categories.edit_view', $category->id)}}" method="GET">
                                                <button type="submit" class="btn btn-outline-success">Edit</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('categories.delete', $category->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-danger text-center" colspan="7">CATEGORY NOT FOUND!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="paginate-sec" >
                        {{ $categories->links() }}
                    </div>
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

@endif
@endsection
