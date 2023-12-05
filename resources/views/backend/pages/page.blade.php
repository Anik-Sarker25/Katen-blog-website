@extends('layouts.dashboard_control')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="row mb-4">
            <!-- Posts list -->
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4" style="color: #757575;">Pages</h6>
                    <div class="d-flex justify-content-between mb-2">
                        <a href="{{ route('pages.add.view')}}"><button type="button" class="btn btn-outline-primary">Add New</button></a>
                         <!-- Button trigger modal -->
                         <button type="button" class="btn btn-outline-primary fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash-arrow-up me-2"></i>Restore</button>

                         <!-- Modal -->
                         <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
                             <div class="modal-dialog modal-xl">
                             <div class="modal-content" style="background: #F3F6F9;">
                                 <div class="modal-header">
                                 <h1 class="modal-title fs-5" id="exampleModalLabel">Deleted Pages</h1>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                 </div>
                                 <div class="modal-body">
                                     <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Author</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Restore</th>
                                                    <th scope="col">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @forelse ($trashedpage as $page)
                                                    <tr>
                                                        <th scope="row" class="py-4">{{ $page->id }}</th>
                                                        <td>
                                                            <textarea name="" style="background: transparent; color: #757575; padding: 12px;" id="" readonly cols="30" rows="2">{{ $page->title }}</textarea>
                                                        </td>
                                                        <td>
                                                            <textarea name="" style="background: transparent; color: #757575; padding: 12px;" id="" readonly cols="15" rows="2">{{ $page->reletionwithuser->name }}</textarea>
                                                        </td>
                                                        <td>
                                                            @if ($page->status == 'active')
                                                                <button type="submit" class="btn btn-outline-success">{{ $page->status}}</button>
                                                            @else
                                                                <button type="submit" class="btn btn-outline-danger">{{ $page->status}}</button>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <form action="{{route('pages.restore', $page->id)}}" method="POST">
                                                            @csrf
                                                                <button type="submit" class="btn btn-outline-success">Restore</button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form action="{{route('pages.force_delete', $page->id)}}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="6" class="text-danger text-center">POST IS EMPTY</td>
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
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">author</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($pages as $page)
                                    <tr>
                                        <th scope="row" class="py-4">{{ $pages->firstItem() + $loop->index }}</th>
                                        <td>
                                            <textarea name="" style="background: transparent; color: #757575; padding: 12px;" id="" readonly cols="15" rows="2">{{ $page->title }}</textarea>
                                        </td>
                                        <td>
                                            <textarea name="" style="background: transparent; color: #757575; padding: 12px;" id="" readonly cols="15" rows="2">{{ $page->reletionwithuser->name }}</textarea>
                                        </td>
                                        <td>
                                            @if ($page->status == 'active')
                                                <form action="{{route('pages.status', $page->id) }}" method="POST">
                                                @csrf
                                                    <button type="submit" class="btn btn-outline-success">{{ $page->status}}</button>
                                                </form>
                                            @else
                                                <form action="{{route('pages.status', $page->id) }}" method="POST">
                                                @csrf
                                                    <button type="submit" class="btn btn-outline-danger">{{ $page->status}}</button>
                                                </form>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{route('pages.edit_view', $page->id)}}" method="GET">
                                                <button type="submit" class="btn btn-outline-success">Edit</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('pages.delete', $page->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-danger text-center">PAGE IS EMPTY</td>
                                </tr>

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="paginate-sec" >
                        {{ $pages->links() }}
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
