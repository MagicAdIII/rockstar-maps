@extends('layouts.app')

@section('content')
<div class="container">

    <h1>{{ trans($resource.'.edit.title') }}</h1>
    <hr>

    {!! Form::model($model, ['method' => 'PATCH', 'route' => [$resource.'.update', $model], 'class' => 'form-horizontal']) !!}

        @include('crud.'.$resource.'.form')

        {!! Form::submit(trans('ui.save'), ['class' => 'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('crud.partials.errors')

</div>
@endsection
