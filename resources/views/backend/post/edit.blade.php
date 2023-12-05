@extends('layouts.dashboard_control')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="row mb-4">
            <!-- Post titile part -->
            <form action="{{ route('posts.edit', $posts->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    {{-- left side --}}
                    <div class="col-sm-12 col-xl-8">
                        <div class="bg-light rounded align-items-center p-4">
                            <h6 class="mb-4" style="color: #757575;">Update Post</h6>
                            {{-- title part --}}
                            <div class="form-floating mb-3">
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="floatingInput"
                                    placeholder="Username" value="{{ $posts->title }}">
                                <label for="floatingInput">Add Title</label>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- description part --}}
                            <div class="mb-3" >
                                <textarea name="description" class="@error('description') is-invalid @enderror" id="editor" cols="77" rows="10">{{ $posts->description }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    {{-- right side --}}
                    <div class="col-sm-12 col-xl-4">
                        {{-- pulish part --}}
                        <div class="bg-light rounded align-items-center p-4 mb-4 text-end">
                            <div class="text-center">

                                <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-share me-2"></i>Update Post</button>
                            </div>
                        </div>
                        {{-- category part  --}}
                        <div class="bg-light rounded align-items-center p-4 mb-4">
                            <div class="mb-3">
                                <label for="selectcategory" class="form-label fw-bold mb-3">Select Category</label>
                                <select class="form-select @error('category_id') is-invalid @enderror" id="selectcategory" name="category_id">
                                    <option value="{{ $posts->reletionwithcategory->id }}" selected>{{ $posts->reletionwithcategory->title }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>
                        {{-- category part  --}}
                        <div class="bg-light rounded align-items-center p-4 mb-4">
                            <label for="selecttags" class="form-label fw-bold mb-3">Choose Tags</label>
                            <div class="bg-white">

                                @foreach ($tags as $tag)
                                    <div class="px-3 py-1">
                                        <input type="checkbox" value="{{ $tag->id }}" class="form-check-input me-2 @error('tag_id') is-invalid @enderror" name="tag_id[]" id="tagcheck{{ $tag->id }}"
                                        @foreach ($posts->reletionwithtags as $t)
                                        @if ($tag->id == $t->id)
                                        checked
                                        @endif
                                        @endforeach
                                        >
                                        <label for="tagcheck{{ $tag->id }}">{{ $tag->name }}</label>
                                    </div>
                                @endforeach
                                @error('tag_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>
                        {{-- Featured Image part  --}}
                        <div class="bg-light rounded align-items-center p-4 mb-4">
                            <label for="imageexample" class="form-label fw-bold mb-3">Choose Featured Image</label>
                            <div class="image mb-2">
                                <img class="w-100" src="{{asset('uploads/post')}}/{{ $posts->image }}" alt="image">
                            </div>
                            <div class="bg-white mb-2">
                                <input type="file" class="form-control" name="image" id="imageexample">

                            </div>
                        </div>

                    </div>

                </div>
            </form>
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


