@extends('layouts.dashboard_control')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="row mb-4">
            <!-- Posts list -->
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4" style="color: #757575;">Messages</h6>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($messages as $message)
                                    <tr>
                                        <th scope="row" class="py-4">{{ $messages->firstItem() + $loop->index }}</th>
                                        <td>
                                            <textarea name="" style="background: transparent; color: #757575; padding: 12px;" id="" readonly cols="15" rows="2">{{ $message->name }}</textarea>
                                        </td>
                                        <td>
                                            <textarea name="" style="background: transparent; color: #757575; padding: 12px;" id="" readonly cols="15" rows="2">{{ $message->email }}</textarea>
                                        </td>
                                        <td>
                                            <textarea name="" style="background: transparent; color: #757575; padding: 12px;" id="" readonly cols="15" rows="2">{{ $message->subject }}</textarea>
                                        </td>
                                        <td>
                                            <textarea name="" style="background: transparent; color: #757575; padding: 12px;" id="" readonly cols="30" rows="2">{{ $message->message }}</textarea>
                                        </td>
                                        <td>
                                            <form action="{{route('message.delete', $message->id)}}" method="POST">
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
                        {{ $messages->links() }}
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
