<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link href="{{ asset('favicon.ico') }}" type="image/x-icon" rel="icon">

    <!-- styles -->
    <link href="{{ asset(mix('styles/app.css', 'assets')) }}" type="text/css" rel="stylesheet">

    <!-- scripts -->
    <script src="{{ asset(mix('scripts/manifest.js', 'assets')) }}" type="text/javascript" defer></script>
    <script src="{{ asset(mix('scripts/vendor.js', 'assets')) }}" type="text/javascript" defer></script>
    <script src="{{ asset(mix('scripts/app.js', 'assets')) }}" type="text/javascript" defer></script>
</head>
<body>
<div id="app" class="laravel">
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title">
                {{ config('app.name') }}
            </div>

            <div class="subtitle m-b-md">
                Built with Laravel {{ $appVersion = App::version() }}
            </div>

            <div class="links m-b-md">
                <a href="https://laravel.com/docs/{{ substr($appVersion, 0, strpos($appVersion, '.', 2)) }}">Laradocs</a>
                <a href="https://github.com/nlmenke/vertebrae">GitHub</a>
            </div>

            <div class="badges">
                <a href="https://travis-ci.org/nlmenke/vertebrae"><img src="https://travis-ci.org/nlmenke/vertebrae.svg"></a>
                <a href="https://github.com/nlmenke/vertebrae/blob/master/LICENSE.md"><img src="https://img.shields.io/badge/license-MIT-428F7E.svg"></a>
            </div>

            <div class="contributors">
                Chiropractors: <a href="https://github.com/nlmenke">nlmenke</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
