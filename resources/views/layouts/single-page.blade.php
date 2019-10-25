@php
$direction = app(\App\Entities\Locale\Locale::class)->where('code', app()->getLocale())->first()->getScript()->getDirection();
if ($direction === 'varies') {
    $direction = 'auto';
}
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"@if($direction != 'ltr') dir="{{ $direction }}"@endif>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link href="{{ asset('favicon.ico') }}" type="image/x-icon" rel="icon">

    <!-- styles -->
    <link href="{{ asset(mix('styles/app.css', 'assets')) }}" type="text/css" rel="stylesheet">
</head>
<body>

<div id="app"></div>

<!-- scripts -->
<script src="{{ asset(mix('scripts/manifest.js', 'assets')) }}" type="text/javascript"></script>
<script src="{{ asset(mix('scripts/vendor.js', 'assets')) }}" type="text/javascript"></script>
<script src="{{ asset(mix('scripts/app.js', 'assets')) }}" type="text/javascript"></script>

</body>
</html>
