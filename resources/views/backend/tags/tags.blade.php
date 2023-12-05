@extends('layouts.dashboard_control')

@section('content')

    <div class="container-fluid mt-4 px-4">
        <div class="row mb-4">
            <!-- Insert tags part -->
            <div class="col-sm-12 col-xl-4">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('tags.add') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <p class="fs-5 fw-bold">Add New Tags</p>
                            <label for="floatingInput" class="form-label fw-bold">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput">
                            <p class="m-2 fst-italic">The name is how it appears on your site.</p>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="floatingInput" class="form-label fw-bold">Slug</label>
                            <input type="text" name="slug" class="form-control" id="floatingInput">
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
                        <h6 style="color: #757575;" class="fs-5 fw-bold">Tags</h6>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash-arrow-up me-2"></i>Restore</button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                            <div class="modal-content" style="background: #F3F6F9;">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Deleted Tags</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th scope="col">Id</th>
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
                                                        <td>{{ $trash->name }}</td>
                                                        <td>{{ $trash->slug }}</td>
                                                        <td>
                                                            @if ($trash->status == 'active')
                                                            <button type="submit" class="btn btn-outline-success">{{ $trash->status}}</button>
                                                            @else
                                                            <button type="submit" class="btn btn-outline-danger">{{ $trash->status}}</button>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('tags.restore',$trash->id) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-outline-primary">Restore</button>
                                                            </form>

                                                        </td>
                                                        <td>
                                                            <form action="{{ route('tags.force_delete',$trash->id) }}" method="POST">
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
                    <div class="table-responsive" style="height: 330px;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($tags as $tag)
                                    <tr>
                                        <th scope="row">{{$tags->firstItem() + $loop->index}}</th>
                                        <td>{{ $tag->name }}</td>
                                        <td>{{ $tag->slug }}</td>
                                        <td>
                                            @if ($tag->status == 'active')
                                                <form action="{{ route('tags.status', $tag->id)}}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-success">{{ $tag->status }}</button>
                                                </form>
                                            @else
                                            <form action="{{ route('tags.status', $tag->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger">{{ $tag->status }}</button>
                                            </form>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('tags.delete', $tag->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-danger text-center" colspan="5">TAGS NOT FOUND!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="paginate-sec" >
                        {{ $tags->links() }}
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
