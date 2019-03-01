<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'АС Учет ПСД') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Навигация">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

                @can('projector-panel')

                <li class="nav-item {{ setActive('projector') }}">
                    <a class="nav-link" href="{{ route('projector.projects.index') }}">Учет проектов</a>
                </li>
                @endcan

                @can('nsi-panel')
                    <li class="nav-item {{ setActive('nsi') }}">
                        <a class="nav-link" href="{{ route('nsi.clients.index') }}">НСИ</a>
                    </li>
                @endcan

                @can('admin-panel')
                    <li class="nav-item {{ setActive('adm') }}">
                        <a class="nav-link" href="{{ route('adm.projects.index') }}">Администрирование</a>
                    </li>
                @endcan
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item {{ setActive('projects') }}">
                    <a class="nav-link" href="{{ route('projects.index') }}">Проекты</a>
                </li>
                <li class="nav-item {{ setActive('users') }}">
                    <a class="nav-link" href="{{ route('users.index') }}">Пользователи</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Здраствуйте, {{ Auth::user() ? Auth::user()->name : 'ГОСТЬ'}} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            Выход из системы
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

