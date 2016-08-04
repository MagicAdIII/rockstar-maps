@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Users <a href="{{ url('/admin/users/create') }}" class="btn btn-primary btn-xs" title="Add New user"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('users.name') }} </th><th> {{ trans('users.username') }} </th><th> {{ trans('users.email') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $item)
                <tr>
                    <td>{{ $item->id or $loop->index }}</td>
                    <td>{{ $item->name }}</td><td>{{ $item->username }}</td><td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ url('/admin/users/' . $item->id) }}" class="btn btn-success btn-xs" title="View user">view</a>
                        <a href="{{ url('/admin/users/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit user">edit</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/users', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete user',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $users->render() !!} </div>
    </div>

</div>
@endsection
