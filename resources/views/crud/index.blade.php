@extends('layouts.app')

@section('content')
<div class="container">

	<h1>{{ trans($resource.'.plural') }} ({{ $model->count() }})</h1>
	<a href="{{ route($resource.'.create') }}" class="btn btn-success">{{ trans($resource.'.add_new') }}</a>
	<hr>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				@foreach ($model->listable as $field)
					<th>{{ trans($resource.'.'.$field) }}</th>
				@endforeach
				<th>{{ trans('ui.actions') }}</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($items as $row)
				<tr>
					<td>{{ $row->id or $loop->index }}</td>
					@foreach ($model->listable as $field)
						<td>{{ $row->{$field} }}</td>
					@endforeach
					<td>
						<a href="{{ route($resource.'.show', $row) }}" class="btn btn-xs btn-success">view</a>
						<a href="{{ route($resource.'.edit', $row) }}" class="btn btn-xs btn-info">edit</a>
						{!! Form::open(['method' => 'DELETE', 'route' => [$resource . '.destroy', $row], 'style' => 'display:inline']) !!}
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
					<td colspan="{{ count($model->listable) + 2 }}"><p>No data in {{ $resource }}.</p></td>
				</tr>
			@endforelse
		</tbody>
	</table>

	{{ $items->links() }}
</div>
@endsection
