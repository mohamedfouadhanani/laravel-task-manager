<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Manager | @yield('title')</title>
    <script src="https://kit.fontawesome.com/8b339e535a.js" crossorigin="anonymous"></script>

    {{-- CSS --}}
    @vite('resources/css/app.css')

    {{-- JS --}}
    @vite('resources/js/navbar.js')
</head>
<body>
    @include('partials.header.navbar')
    @yield('content')
</body>
</html>