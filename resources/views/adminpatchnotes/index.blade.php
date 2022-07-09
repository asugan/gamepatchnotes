@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Patchnotes Game Page</h2>
        <div class="lead">
            Manage Your Patchnotes Here.
            <a href="{{ route('patchnotes.create') }}" class="btn btn-primary btn-sm float-right">Add Patchnote!</a>
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered">
            <tr>
                <th width="1%">No</th>
                <th width="1%">Game_no</th>
                <th>Patchnote Name</th>
                <th width="3%" colspan="5">Action</th>
            </tr>
            @foreach ($posts as $key => $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->games_id }}</td>
                    <td>{{ $post->post_title }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('patchnotes.show', $post->slug) }}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('patchnotes.edit', $post->slug) }}">Edit</a>
                    </td>
                    <td>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['patchnotes.destroy', $post->slug],
                            'style' => 'display:inline',
                        ]) !!}
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
