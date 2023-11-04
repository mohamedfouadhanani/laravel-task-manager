@php
    $logout_route = route('logout');
@endphp

<header class="mb-4">
    <x-container class="flex justify-between items-center p-4">
        <h1 class="font-bold text-2xl capitalize">task manager</h1>
        <section class="flex items-center justify-between space-x-2">
            @include('partials.header.links', ["class" => "hidden sm:flex items-center space-x-4"])
            @auth
            @include('partials.profile-dropdown.dropdown')
            @endauth
            <button id="menu-btn" class="sm:hidden px-3 py-2 rounded bg-transparent">
                <i id="bars-icon" class="fa-solid fa-bars"></i>
                <i id="xmark-icon" class="hidden fa-solid fa-xmark"></i>
            </button>
        </section>
    </x-container>
    @include('partials.header.links', ["id" => "small-screen-navbar", "class" => "hidden flex-col p-4 bg-black text-white space-y-4"])
</header>