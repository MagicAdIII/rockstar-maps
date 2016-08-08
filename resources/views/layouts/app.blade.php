<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

    <title>Rockstar Maps</title>

    <!-- Styles -->
    <link href="{{ elixirAsset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('partials.navbar')
    @yield('content')

    <!-- Scripts -->
    @stack('scripts')
    <script src="{{ elixirAsset('js/app.js') }}"></script>
</body>
</html>
