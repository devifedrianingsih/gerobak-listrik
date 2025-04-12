<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="{{ URL::asset('build/images/favicon-32x32.png') }}" type="image/png">
    <title>@yield('title', 'Laravel')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('partials.navbar')
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
