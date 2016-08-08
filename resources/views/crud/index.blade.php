@extends('layouts.app')

@section('content')
<div class="container">

	<h1>{{ trans($resource.'.plural') }} ({{ $count }})</h1>
	<a href="{{ route($resource.'.create') }}" class="btn btn-success">{{ trans($resource.'.add_new') }}</a>
	<hr>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				@foreach ($listable as $field)
					<th>{{ trans($resource.'.'.$field) }}</th>
				@endforeach
				<th>{{ trans('admin.actions') }}</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($data as $item)
				<tr>
					<td>{{ $item->id or $loop->index }}</td>
					@foreach ($listable as $field)
						<td>{{ $item->{$field} }}</td>
					@endforeach
					<td>
						<a href="{{ route($resource.'.show', $item) }}" class="btn btn-xs btn-success">view</a>
						<a href="{{ route($resource.'.edit', $item) }}" class="btn btn-xs btn-info">edit</a>
						{!! Form::open(['method' => 'DELETE', 'route' => [$resource . '.destroy', $item], 'style' => 'display:inline']) !!}
                            {!! Form::button('delete', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'value' => 'delete',
                                'onclick' => 'return confirm("Are you sure?")'
                            ]); !!}
                        {!! Form::close() !!}
					</td>
				</tr>
			@empty
				<tr>
					<td colspan="{{ count($listable) }}"><p>No data in {{ $resource }}.</p></td>
				</tr>
			@endforelse
		</tbody>
	</table>

	{{ $data->links() }}
</div>
@endsection