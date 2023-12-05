@extends('layouts.dashboard_control')

@section('content')
    <!-- Profile Start -->
    <div class="container-fluid pt-4 px-4">
        <!-- Site setting part -->
        <div class="row mb-5">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('setting.insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <h6 class="mb-4" style="color: #757575;">Site Title</h6>
                        <div class="form-floating mb-3">
                            <input type="text" name="sitetitle" class="form-control @error('sitetitle') is-invalid @enderror" id="floatingInput"
                                placeholder="Username">
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
                                placeholder="Username">
                            <label for="floatingInput">Your tagline goes here</label>
                            @error('tagline')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <h6 class="mb-4" style="color: #757575;">Site Logo</h6>
                        <div class="form-floating mb-3">
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="floatingInput"
                                placeholder="Image">
                            <label for="floatingInput">Site Logo</label>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-outline-primary">Add Info</button>
                    </form>
                </div>
            </div>

        </div>

        {{-- info table  --}}
        <div class="row mb-4">
            <!-- Posts list -->
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4" style="color: #757575;">Details list</h6>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Site logo</th>
                                    <th scope="col">Site title</th>
                                    <th scope="col">tagline</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($details as $detail)
                                    <tr>
                                        <th scope="row" class="py-4">{{ $details->firstItem() + $loop->index }}</th>
                                        <td>
                                            <img style="width: 100px; border-radius: 2px;" src="{{asset('uploads/sitelogo')}}/{{ $detail->logo }}" alt="image">
                                        </td>
                                        <td>
                                            <textarea name="" style="background: transparent; color: #757575; padding: 12px;" id="" readonly cols="15" rows="2">{{ $detail->site_title }}</textarea>
                                        </td>
                                        <td>
                                            <textarea name="" style="background: transparent; color: #757575; padding: 12px;" id="" readonly cols="15" rows="2">{{ $detail->tagline }}</textarea>
                                        </td>
                                        <td>
                                            @if ($detail->status == 'active')
                                                <form action="{{route('setting.status', $detail->id) }}" method="POST">
                                                @csrf
                                                    <button type="submit" class="btn btn-outline-success">{{ $detail->status}}</button>
                                                </form>
                                            @else
                                                <form action="{{route('setting.status', $detail->id) }}" method="POST">
                                                @csrf
                                                    <button type="submit" class="btn btn-outline-danger">{{ $detail->status}}</button>
                                                </form>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{route('setting.edit_view', $detail->id)}}" method="GET">
                                                <button type="submit" class="btn btn-outline-success">Edit</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('setting.delete', $detail->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-danger text-center">DETAILS IS EMPTY</td>
                                </tr>

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="paginate-sec" >
                        {{ $details->links() }}
                    </div>
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

@endif

@endsection
