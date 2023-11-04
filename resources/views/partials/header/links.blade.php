@php
    $id ??= "";
    $class ??= "";

    $register_route = route('register');
    $login_route = route('login');

    $tasks_route = route('tasks.index');
@endphp

<nav id="{{ $id }}" class="{{ $class }}">
    @auth
    <x-link href="{{ $tasks_route }}">tasks</x-link>
    @endauth
    
    @guest
    <x-link href="{{ $register_route }}">register</x-link>
    <x-link href="{{ $login_route }}">login</x-link>
    @endguest
</nav>