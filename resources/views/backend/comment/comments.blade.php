@extends('layouts.dashboard_control')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="row mb-4">
            <!-- Posts list -->
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4" style="color: #757575;">Comments</h6>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($comments as $comment)
                                    <tr>
                                        <th scope="row" class="py-4">{{ $comments->firstItem() + $loop->index }}</th>
                                        <td>
                                            <textarea name="" style="background: transparent; color: #757575; padding: 12px;" id="" readonly cols="15" rows="2">{{ $comment->name }}</textarea>
                                        </td>
                                        <td>
                                            <textarea name="" style="background: transparent; color: #757575; padding: 12px;" id="" readonly cols="15" rows="2">{{ $comment->email }}</textarea>
                                        </td>
                                        <td>
                                            <textarea name="" style="background: transparent; color: #757575; padding: 12px;" id="" readonly cols="30" rows="2">{{ $comment->message }}</textarea>
                                        </td>
                                        <td>
                                            @if ($comment->status == 'active')
                                                <form action="{{route('comment.status', $comment->id) }}" method="POST">
                                                @csrf
                                                    <button type="submit" class="btn btn-outline-success">{{ $comment->status}}</button>
                                                </form>
                                            @else
                                                <form action="{{route('comment.status', $comment->id) }}" method="POST">
                                                @csrf
                                                    <button type="submit" class="btn btn-outline-danger">{{ $comment->status}}</button>
                                                </form>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{route('comment.delete', $comment->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-danger text-center">COMMENT IS EMPTY</td>
                                </tr>

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="paginate-sec" >
                        {{ $comments->links() }}
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
