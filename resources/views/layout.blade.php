<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dashboard">

    <title>{{ config('app.name') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <script src="{{ asset('js/admin.js') }}" defer></script>

    @stack('scripts')

    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/free.min.css">

    <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

</head>
<body>
<div id="app" class="c-app">
    @include('admin::sidebar')
    <div class="c-wrapper" style="transition: none;">
        <header class="c-header c-header-light c-header-fixed">
            <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
                <span class="c-header-toggler-icon"></span>
            </button>

            <ul class="c-header-nav">
                @can('viewAny', config('admin.models.user'))
                    <li class="c-header-nav-item px-3">
                        <a class="c-header-nav-link" href="{{ route('admin.users.index') }}">Users</a>
                    </li>
                @endcan

                @can('viewAny', config('admin.models.role'))
                    <li class="c-header-nav-item px-3">
                        <a class="c-header-nav-link" href="{{ route('admin.roles.index') }}">Roles</a>
                    </li>
                @endcan
            </ul>

            <ul class="c-header-nav ml-auto mr-2">
                <li class="c-header-nav-item dropdown">
                    <a class="c-header-nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="post">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </header>
        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>
            <footer class="c-footer">
                <div> © {{ date('Y') }} {{ config('app.name') }}.</div>
            </footer>
        </div>
    </div>

</div>
</body>
</html>
