@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Add New Patchnote</h2>
        <div class="lead">
            Add New Patchnote.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('patchnotes.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Game Name</label>
                            <input value="{{ old('title') }}" type="text" class="form-control" name="post_title"
                                placeholder="Game Name" required>

                            @if ($errors->has('title'))
                                <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="body" class="form-label">Developer</label>
                            <input class="form-control" name="post_body" placeholder="Developer"
                                required>{{ old('body') }}

                            @if ($errors->has('body'))
                                <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label for="description" class="form-label">Game Platform</label>
                            <input value="{{ old('description') }}" type="text" class="form-control" name="games_id"
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
