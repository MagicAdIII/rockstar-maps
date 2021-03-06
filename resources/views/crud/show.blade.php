@extends('layouts.app')

@section('content')
<div class="container">

    <h1>{{ trans($resource.'.show.title') }}: {{ $item->id }}</h1>
    <a class="btn btn-info" href="{{ route($resource.'.edit', $item) }}">edit</a>
    <hr>

	<table class="table table-striped">
		<tbody>
		    @foreach ($model->listable as $field)
		    	<tr>
		    		<th>{{ trans($resource.'.'.$field) }}</th>
		    		<td>{{ $item->{$field} }}</td>
		    	</tr>
		    @endforeach
		</tbody>
	</table>

</div>
@endsection
