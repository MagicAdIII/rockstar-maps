@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Roles <a href="{{ route('roles.create') }}" class="btn btn-primary btn-xs" title="Add New Role"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Name </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($roles as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ route('roles.show', $item->id) }}" class="btn btn-success btn-xs" title="View Role">view</a>
                        <a href="{{ route('roles.edit', $item->id) }}" class="btn btn-primary btn-xs" title="Edit Role">edit</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['roles.destroy', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Role',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $roles->render() !!} </div>
    </div>

</div>
@endsection
