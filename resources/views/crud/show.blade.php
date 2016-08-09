@extends('layouts.app')

@section('content')
<div class="container">

    <h1>{{ trans($resource.'.show.title') }}: {{ $model->id }}</h1>
    <hr>

	<table class="table table-striped">
		<tbody>
		    @foreach ($model->listable as $field)
		    	<tr>
		    		<th>{{ trans($resource.'.'.$field) }}</th>
		    		<td>{{ $model->value($field) }}</td>
		    	</tr>
		    @endforeach
		</tbody>
	</table>

</div>
@endsection
