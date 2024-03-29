@extends('admin.layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Update Game</h2>
        <div class="lead">
            Edit game.
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{ route('games.update', $post->slug) }}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Game Name</label>
                            <input value="{{ $post->game_name }}" type="text" class="form-control" name="game_name"
                                placeholder="Title" required>

                            @if ($errors->has('title'))
                                <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="description" class="form-label">Game Platform</label>
                            <input value="{{ $post->game_platform }}" type="text" class="form-control"
                                name="game_platform" placeholder="Description" required>

                            @if ($errors->has('description'))
                                <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label for="body" class="form-label">Release Date</label>
                            <input value="{{ $post->release_date }}" type="text" class="form-control" name="release_date"
                                placeholder="Description" required>

                            @if ($errors->has('body'))
                                <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label for="body" class="form-label">Developer</label>
                            <input value="{{ $post->developer }}" type="text" class="form-control" name="developer"
                                placeholder="Description" required>

                            @if ($errors->has('body'))
                                <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label for="body" class="form-label">Genre</label>
                            <input value="{{ $post->genre }}" type="text" class="form-control" name="genre"
                                placeholder="Description" required>

                            @if ($errors->has('body'))
                                <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="body" class="form-label">Game App ID</label>
                            <input class="form-control" value="{{ $post->id }}" name="id"
                                placeholder="Game APP ID" required>{{ old('body') }}

                            @if ($errors->has('body'))
                                <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            @if ($post->recommended == 'on')
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Recommended</label>
                                </div>
                            @else
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                        name="recommended">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Recommended</label>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 mb-4 mt-3">

                        <div class="mb-3 px-5">
                            <label for="body" class="form-label">Game Image URL</label>
                            <input class="form-control" name="game_image" value="{{ $post->game_image }}"
                                placeholder="Game Image URL" required>{{ old('body') }}

                            @if ($errors->has('body'))
                                <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 px-5">
                            <label for="body" class="form-label">Game short URL</label>
                            <input class="form-control" name="short_image" value="{{ $post->short_image }}"
                                placeholder="Game Image URL" required>{{ old('body') }}

                            @if ($errors->has('body'))
                                <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 px-5">
                            <label for="body" class="form-label">Game bg URL</label>
                            <input class="form-control" name="background_image" value="{{ $post->background_image }}"
                                placeholder="Game Image URL" required>{{ old('body') }}

                            @if ($errors->has('body'))
                                <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 px-5">
                            <label for="body" class="form-label">Desc</label>
                            <input class="form-control" name="description" value="{{ $post->description }}"
                                placeholder="Game Image URL" required>{{ old('body') }}

                            @if ($errors->has('body'))
                                <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 px-5">
                            <label for="body" class="form-label">Desc</label>
                            <input class="form-control" name="website" value="{{ $post->website }}"
                                placeholder="Game Image URL" required>{{ old('body') }}

                            @if ($errors->has('body'))
                                <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="d-flex justify-content-center gap-3">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <a href="{{ route('games.index') }}" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>

    </div>
@endsection
