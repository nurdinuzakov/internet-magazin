<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    @include('layout.styles')
    <title>@yield('title')</title>
</head>
<body>
    @include('layout.nav')

    @yield('content')

    @include('layout.footer')
    @include('layout.scripts')
    @yield('script')
</body>
</html>
