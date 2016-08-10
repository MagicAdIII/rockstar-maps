@extends('layouts.app')

@section('content')
<div class="container">

    <h1>{{ trans($resource.'.edit.title') }}</h1>
    <hr>

    {!! Form::model($item, ['method' => 'PATCH', 'route' => [$resource.'.update', $item], 'class' => 'form-horizontal']) !!}

        @include('crud.'.$resource.'.form')

        {!! Form::submit(trans('ui.save'), ['class' => 'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

</div>
@endsection
