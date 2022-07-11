@extends('admin.layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Edit patchnote</h2>
        <div class="lead">
            Edit patchnote.
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{ route('patchnotes.update', $post->slug) }}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Post Title</label>
                            <input value="{{ $post->post_title }}" type="text" class="form-control" name="post_title"
                                placeholder="Game Name" required>

                            @if ($errors->has('title'))
                                <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="body" class="form-label">Patch Notes</label>
                            <input class="form-control" value="{{ $post->post_body }}" name="post_body"
                                placeholder="Developer" required>

                            @if ($errors->has('body'))
                                <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label for="description" class="form-label">Game ID</label>
                            <input value="{{ $post->games_id }}" type="text" class="form-control" name="games_id"
                                placeholder="Game Platform" required>

                            @if ($errors->has('description'))
                                <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 mb-4 mt-3">
                        <div class="d-flex justify-content-center">
                            <div class="col-6">
                                <input type="file" name="post_image" class="form-control">
                                <div class="col-12 text-center mt-4">
                                    <img src="{{ @App::make('url')->to('/') . '/storage' . $post->post_image }}"
                                        width="150">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center gap-3">
                    <button type="submit" class="btn btn-primary">Post a Patchnote!</button>
                    <a href="{{ route('patchnotes.index') }}" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>

    </div>
@endsection
