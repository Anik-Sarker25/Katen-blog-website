@extends('layouts.dashboard_control')

@section('content')

<div class="container-fluid mt-4 px-4">
    <div class="row mb-4">
        <!-- All Users list -->
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="d-flex justify-content-between mb-2">
                    <p class="fs-5 fw-bold">All varified Users</p>
                    <a href="{{ route('users.add.view')}}"><button type="button" class="btn btn-outline-primary">Add New</button></a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Edit Role</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>

                         @forelse ($all_users as $user)
                            @if ($user->approve_status == true)
                                 <tr>
                                   <th scope="row">{{ $loop->index +1}}</th>
                                   <td>
                                        <img style="width: 36px; border-radius: 5px;" src="{{ asset('uploads/profile') }}/{{ $user->image }}" alt="image">
                                   </td>
                                   <td>{{ $user->name }}</td>
                                   <td>{{ $user->email }}</td>
                                   <td class="text-capitalize">{{ $user->role }}</td>

                                   <td>
                                       <!-- Button trigger modal -->
                                        <button type="submit" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $user->id}}">Edit</button>
                                   </td>



                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop{{ $user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Select Role</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('users.edit', $user->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <label for="Username" class="mb-2">Username</label>
                                                    <input type="text" name="usernam" readonly class="form-control" value="{{ $user->name }}">

                                                    <label for="roleexample" class="mt-3 mb-2">Update Role</label>
                                                    <select class="form-select text-capitalize" name="role" id="roleexample">
                                                        <option selected>{{ $user->role }}</option>
                                                        <option value="user">User</option>
                                                        <option value="author">Author</option>
                                                        <option value="editor">Editor</option>
                                                        <option value="administrator">Administrator</option>
                                                    </select>

                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-primary">Update</button>
                                                </div>
                                            </form>

                                        </div>
                                        </div>
                                    </div>

                                   <td>
                                        <form action="{{ route('users.delete', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </form>
                                   </td>
                                 </tr>
                            @endif
                         @empty
                             <tr>
                                <td colspan="6" class="text-danger text-center">THIS TABLE IS EMPTY</td>
                             </tr>

                         @endforelse

                        </tbody>
                    </table>
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
