@extends('layouts.app')

@section('content')
<div class="container">

    <h1>{{ trans($resource.'.create.title') }}</h1>
    <hr>

    {!! Form::model($item, ['route' => [$resource.'.index', $item], 'class' => 'form-horizontal']) !!}

        @include('crud.'.$resource.'.form')

        {!! Form::submit(trans('ui.create'), ['class' => 'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

</div>
@endsection
