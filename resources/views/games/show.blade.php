@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Game {{ $game->id }}
        <a href="{{ url('/admin/games/' . $game->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Game"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['/admin/games', $game->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Game',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $game->id }}</td>
                </tr>
                <tr><th> Title </th><td> {{ $game->title }} </td></tr><tr><th> Slug </th><td> {{ $game->slug }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
