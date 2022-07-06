@extends('layouts.app-master')

@section('content')
    <h1 class="mb-3">Maraba123</h1>

    <div class="bg-light p-4 rounded">
        <h2>Posts</h2>
        <div class="lead">
            Manage your posts here.
            <a href="{{ route('games.create') }}" class="btn btn-primary btn-sm float-right">Add post</a>
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered">
            <tr>
                <th width="1%">No</th>
                <th>Name</th>
                <th width="3%" colspan="5">Action</th>
            </tr>
            @foreach ($posts as $key => $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->game_name }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('games.show', $post->slug) }}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('games.edit', $post->slug) }}">Edit</a>
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['games.destroy', $post->slug], 'style' => 'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {!! $posts->links() !!}
        </div>

    </div>
@endsection
