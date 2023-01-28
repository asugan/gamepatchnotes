@extends('admin.layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Add New Patchnote</h2>
        <div class="lead">
            Add New Patchnote.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="title" class="form-label">Patchnote Title</label>
                            <input value="{{ old('title') }}" type="text" class="form-control" name="blog_title"
                                placeholder="Patchnote Title" required>

                            @if ($errors->has('title'))
                                <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-7 offset-3 mt-4">
                        <div class="card-body">

                            <div class="form-group">
                                <textarea id="editor" class="ckeditor form-control" name="blog_body"></textarea>
                            </div>

                        </div>
                    </div>


                    <div class="col-6">
                        <div class="mb-3">
                            <label for="description" class="form-label">App ID</label>
                            <input value="{{ old('description') }}" type="text" class="form-control"
                                name="blog_description" placeholder="App ID" required>

                            @if ($errors->has('description'))
                                <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="description" class="form-label">image</label>
                            <input value="{{ old('description') }}" type="file" class="form-control" name="image"
                                placeholder="App ID" required>

                            @if ($errors->has('description'))
                                <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex justify-content-center gap-3">
                        <button type="submit" class="btn btn-primary">Post a Patchnote!</button>
                        <a href="{{ route('blog.index') }}" class="btn btn-danger">Back</a>
                    </div>
            </form>
        </div>
    </div>


    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '{{ route('blog.imageupload') . '?_token=' . csrf_token() }}',
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
