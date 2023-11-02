<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Manager | @yield('title')</title>
</head>
<body>
    @auth
    <form action="{{ route("logout") }}" method="post">
        @csrf
        <input type="submit" value="logout">
    </form>
    @endauth

    @yield('content')
</body>
</html>