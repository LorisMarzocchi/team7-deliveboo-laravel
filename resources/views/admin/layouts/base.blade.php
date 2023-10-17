<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <title>Deliveboo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto">
        @include('admin.partials.header')
        <main class="mt-[88px]">
            @yield('contents')
        </main>
    </div>
</body>
</html>