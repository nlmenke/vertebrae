<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- styles -->
    <link href="{{ asset(mix('styles/app.css', 'assets')) }}" type="text/css" rel="stylesheet">

    <!-- scripts -->
    <script src="{{ asset(mix('scripts/manifest.js', 'assets')) }}" type="text/javascript" defer></script>
    <script src="{{ asset(mix('scripts/vendor.js', 'assets')) }}" type="text/javascript" defer></script>
    <script src="{{ asset(mix('scripts/app.js', 'assets')) }}" type="text/javascript" defer></script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-laravel" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="{{ trans('common.toggle_navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navbar" class="collapse navbar-collapse">
                <!-- left side of navbar -->
                <ul class="navbar-nav mr-auto">
{{--                    <li class="nav-item">--}}
{{--                        <a href="#" class="nav-link">Link 1</a>--}}
{{--                    </li>--}}
                </ul>

                <!-- right side of navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- authentication links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ trans('auth.login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ trans('auth.register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right"
                                 aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ trans('auth.logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="post" style="display:none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <footer class="container">
        <p class="float-right"><a href="#">{{ trans('common.back_to_top') }}</a></p>
        <p>&copy; 2018{{ (date('Y') > 2018) ? '-' . date('Y') : '' }} <a href="{{ url('/') }}">n.l.menke</a></p>
    </footer>
</div>
</body>
</html>
