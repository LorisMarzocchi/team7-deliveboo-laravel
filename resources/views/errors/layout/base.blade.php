<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
        <title>Deliveboo</title>
        @vite(['resources/css/app.css'])
    </head>
    <body>
        @include('errors.layout.header')
        @yield('content')
    </body>
</html>
