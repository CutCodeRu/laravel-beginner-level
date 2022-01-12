<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    @yield('content')

    <script src="/js/app.js"></script>
</body>
</html>
