@extends('layout')

@section('title', 'Register')

@php
    $name = old("name");
    $email = old("email");
    $password = old("password");
    
    $register_route = route("register");
    $login_route = route("login");
@endphp

@section('content')
<x-container class="p-4">
    <x-form.form action="{{ $register_route }}" method="post" class="mb-4 w-full sm:w-1/2 mx-auto">
        @csrf
        <x-input.section name="name" label="name">
            <x-input.field type="text" name="name" placeholder="Enter your name" :value="$name" :errors="$errors" />
        </x-input.section>

        <x-input.section name="email" label="email">
            <x-input.field autocomplete="on" type="email" name="email" placeholder="Enter your email" :value="$email" :errors="$errors" />
        </x-input.section>

        <x-input.section name="password" label="password">
            <x-input.field type="password" name="password" placeholder="Enter your password" :value="$password" :errors="$errors" />
        </x-input.section>

        <x-input.section name="password_confirmation" label="confirmation password">
            <x-input.field type="password" name="password_confirmation" placeholder="Re-enter your password" :errors="$errors" />
        </x-input.section>

        <section class="flex justify-between items-center capitalize">
            <x-button type="primary">register</x-button>
            <span>already have an account? <x-link href="{{ $login_route }}" type="http">login</x-link></span>
        </section>
    </x-form.form>
</x-container>
@endsection