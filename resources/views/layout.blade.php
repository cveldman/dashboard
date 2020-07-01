<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dashboard">

    <title>{{ config('app.name') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (file_exists(public_path('css/admin.css')))
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @elseif(file_exists(public_path('veldman/dashboard/admin.css')))
        <link rel="stylesheet" href="{{ asset('veldman/dashboard/admin.css') }}">
    @else
        <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous">
    @endif

    @stack('styles')

    @if (file_exists(public_path('js/admin.js')))
        <script src="{{ asset('js/admin.js') }}" defer></script>
    @elseif(file_exists(public_path('veldman/dashboard/admin.js')))
        <script src="{{ asset('veldman/dashboard/admin.js') }}" defer></script>
    @else
        <script src="https://unpkg.com/@popperjs/core@2" defer></script>
        <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js" defer></script>
    @endif

    @stack('scripts')

    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/free.min.css">

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

                    @alerts

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
