<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | {{ config('app.name') }}</title>

    <link href="{{ asset('favicon.ico') }}" type="image/x-icon" rel="icon">

    <!-- styles -->
    <link href="{{ asset(mix('styles/app.css', 'assets')) }}" type="text/css" rel="stylesheet">

    <style>
        html,
        body {
            background-color: #FFFFFF;
            color: #636B6F;
            font-family: 'Open Sans', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 36px;
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title">
            @yield('message')
        </div>
    </div>
</div>
</body>
</html>
