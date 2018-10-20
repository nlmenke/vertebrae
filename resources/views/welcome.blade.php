<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link href="{{ asset('favicon.ico') }}" type="image/x-icon" rel="icon">

    <!-- styles -->
    <link href="{{ mix('styles/app.css', 'assets') }}" type="text/css" rel="stylesheet">
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (\Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (\Route::has('register'))
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
            Built with Laravel {{ \App::version() }}
        </div>

        <div class="links">
            <a href="https://laravel.com/docs">Documentation</a>
            <a href="https://laracasts.com">Laracasts</a>
            <a href="https://laravel-news.com">News</a>
            <a href="https://nova.laravel.com">Nova</a>
            <a href="https://forge.laravel.com">Forge</a>
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>
    </div>
</div>

<!-- scripts -->
<script src="{{ mix('scripts/app.js', 'assets') }}" type="text/javascript"></script>

</body>
</html>
