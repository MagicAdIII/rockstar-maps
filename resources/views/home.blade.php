@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-6">
        <h1>Welcome to RockstarMaps!</h1>
        <p>choose a game</p>

        @foreach ($games as $game)
            <a href="{{ route('maps.index', $game) }}">{{ $game->title }}</a>
        @endforeach
    </div>
</div>
@endsection
