<!doctype html>
{{-- @todo UGLY --}}
@if (request()->is('*/map'))
<html lang="{{ config('app.locale') }}" class="map-layout">
@else
<html lang="{{ config('app.locale') }}">
@endif
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

    <title>Rockstar Maps</title>

    <link href="{{ elixirAsset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('partials.navbar')
    @yield('content')

    {{-- @todo UGLY --}}
    @if (request()->is('*/map'))
        @stack('scripts')
        <script src="{{ elixirAsset('js/app.js') }}"></script>
    @endif

</body>
</html>
