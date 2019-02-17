<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<header>

    @include('layouts._topNav')
</header>
<main class="app-content py-2">
    <div class="container-fluid">

        @section('breadcrumbs', Breadcrumbs::render())
        @yield('breadcrumbs')
        @include('layouts._flash')
        <div class="row justify-content-center">
            <div class="col-2">

            </div>
            <div class="col-10">

                @yield('content')
            </div>
        </div>
    </div>
</main>
<footer>

    @include('layouts._footer')
</footer>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
