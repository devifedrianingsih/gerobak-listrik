<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('build/images/favicon-32x32.png') }}" type="image/png">
    <title>@yield('title') | Gerobak Listrik Angkringan</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ URL::asset('build/images/favicon-32x32.png') }}" type="image/png">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    @include('layouts.head-css')
</head>

<body>

    @include('layouts.topbar')

    @include('layouts.sidebar')

    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            @yield('content')
        </div>
    </main>

    <!--start overlay-->
    <div class="overlay btn-toggle"></div>
    <!--end overlay-->

    @include('layouts.common-scripts')
</body>

</html>
