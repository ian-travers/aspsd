<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css', 'build') }}" rel="stylesheet">
</head>
<body>
<header>
    @include('layouts._topNav')
</header>
<main id="app" class="app-content py-2">
    <div class="container-fluid">

        @section('breadcrumbs', Breadcrumbs::render())
        @yield('breadcrumbs')
        {{--        @include('layouts._flash')--}}
        <div class="row justify-content-center">
            <div class="col-2">
                <div class="card border-primary">
                    <div class="card-header text-white bg-primary">
                        Таблицы НСИ
                    </div>
                    <nav class="nav flex-column">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-action">
                                <a class="nav-link active" href="{{ route('nsi.clients.index') }}">Заказчики</a>
                            </li>
                        </ul>
                    </nav>
                </div>
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
<script src="{{ mix('js/app.js', 'build') }}"></script>

@include('layouts._izitoastAlerts')
</body>
</html>
