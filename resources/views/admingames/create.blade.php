@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Add New Game</h2>
        <div class="lead">
            Add New Game.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('games.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Game Name</label>
                            <input value="{{ old('title') }}" type="text" class="form-control" name="game_name"
                                placeholder="Game Name" required>

                            @if ($errors->has('title'))
                                <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="body" class="form-label">Developer</label>
                            <input class="form-control" name="developer" placeholder="Developer"
                                required>{{ old('body') }}

                            @if ($errors->has('body'))
                                <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label for="description" class="form-label">Game Platform</label>
                            <input value="{{ old('description') }}" type="text" class="form-control"
                                name="game_platform" placeholder="Game Platform" required>

                            @if ($errors->has('description'))
                                <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label for="body" class="form-label">Release Date</label>
                            <input class="form-control" name="release_date" placeholder="Release Date"
                                required>{{ old('body') }}

                            @if ($errors->has('body'))
                                <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label for="body" class="form-label">Genre</label>
                            <input class="form-control" name="genre" placeholder="Genre" required>{{ old('body') }}

                            @if ($errors->has('body'))
                                <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 mb-4 mt-3">
                        <div class="d-flex justify-content-center">
                            <div class="col-6">
                                <input type="file" name="game_image" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center gap-3">
                    <button type="submit" class="btn btn-primary">Post a Game!</button>
                    <a href="{{ route('games.index') }}" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
