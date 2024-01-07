<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Timedoor Programming Test</title>

    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    @include('header')

    <div class="mx-4 pt-[120px] md:mx-10 lg:mx-auto lg:max-w-[974px]">
        @yield('content')
    </div>
</body>

</html>