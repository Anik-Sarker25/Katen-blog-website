@extends('layouts.dashboard_control')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="row mb-4">
            <!-- Post titile part -->
            <div class="col-sm-12 col-xl-12">
                <form action="{{ route('pages.insert') }}" method="POST">
                    @csrf
                    <div class="bg-light rounded align-items-center p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <h6 class="mb-4" style="color: #757575;">Add New Page</h6>
                            <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-share me-2"></i>Publish Page</button>
                        </div>

                        {{-- title part --}}
                        <div class="form-floating mb-3">
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="floatingInput"
                                placeholder="Username" value="{{ old('title')}}">
                            <label for="floatingInput">Page Title</label>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- description part --}}
                        <div class="mb-3" >
                            <textarea name="description" class="@error('description') is-invalid @enderror" id="editor" cols="77" rows="10">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts_content')

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection
