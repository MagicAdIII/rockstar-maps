@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Game <a href="{{ url('/admin/games/create') }}" class="btn btn-primary btn-xs" title="Add New Game"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Title </th><th> Slug </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($games as $item)
                <tr>
                    <td>{{ $item->id or $loop->index }}</td>
                    <td>{{ $item->title }}</td><td>{{ $item->slug }}</td>
                    <td>
                        <a href="{{ url('/admin/games/' . $item->id) }}" class="btn btn-success btn-xs" title="View Game"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/games/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Game"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/games', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Game" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Game',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $games->render() !!} </div>
    </div>

</div>
@endsection
