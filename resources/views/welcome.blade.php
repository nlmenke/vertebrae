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
<div class="laravel">
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
                <a href="https://laravel.com/docs/{{ substr($appVersion, 0, strpos($appVersion, '.', 1)) }}.x" target="_blank">Laradocs</a>
                <a href="https://github.com/nlmenke/vertebrae" target="_blank">GitHub</a>
            </div>

            <div class="badges">
                <a href="https://travis-ci.org/nlmenke/vertebrae" target="_blank"><img src="https://travis-ci.org/nlmenke/vertebrae.svg?branch=master" alt="travis-ci-build-status"></a>
                <a href="https://codecov.io/gh/nlmenke/vertebrae" target="_blank"><img src="https://codecov.io/gh/nlmenke/vertebrae/branch/master/graph/badge.svg" alt="codecov"></a>
                <a href="https://github.styleci.io/repos/153017543" target="_blank"><img src="https://github.styleci.io/repos/153017543/shield?style=flat" alt="style-ci"></a>
                <br>
                <a href="https://scrutinizer-ci.com/g/nlmenke/vertebrae/build-status/master" target="_blank"><img src="https://scrutinizer-ci.com/g/nlmenke/vertebrae/badges/build.png?b=master" alt="scrutinizer-build-status"></a>
                <a href="https://scrutinizer-ci.com/g/nlmenke/vertebrae/?branch=master" target="_blank"><img src="https://scrutinizer-ci.com/g/nlmenke/vertebrae/badges/coverage.png?b=master" alt="scrutinizer-code-coverage"></a>
                <a href="https://scrutinizer-ci.com/g/nlmenke/vertebrae/?branch=master" target="_blank"><img src="https://scrutinizer-ci.com/g/nlmenke/vertebrae/badges/quality-score.png?b=master" alt="scrutinizer-code-quality"></a>
                <br>
                <a href="https://github.com/nlmenke/vertebrae/blob/master/LICENSE.md" target="_blank"><img src="https://img.shields.io/badge/license-MIT-428F7E.svg" alt="mit-license"></a>
            </div>

            <div class="contributors">
                Chiropractors:
                <div class="list-group list-group-flush">
                    <a href="https://github.com/nlmenke" class="list-group-item list-group-item-action" target="_blank">nlmenke</a>
                    <a href="https://github.com/dave9011" class="list-group-item list-group-item-action" target="_blank">dave9011</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
