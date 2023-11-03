@extends('layout')

@section('title', 'Login')

@php
    $email = old("email");
    $password = old("password");

    $register_route = route("register");
    $forgot_password_route = route("password.request");
    $login_route = route("login");
@endphp

@section('content')
<x-container class="p-4">
    <x-form.form action="{{ $login_route }}" method="post" class="mb-4 w-full sm:w-1/2 mx-auto">
        @csrf
        <x-input.section name="email" label="email">
            <x-input.field autocomplete="on" type="email" name="email" placeholder="Enter your email" :value="$email" :errors="$errors" />
        </x-input.section>

        <x-input.section name="password" label="password">
            <x-input.field type="password" name="password" placeholder="Enter your password" :value="$password" :errors="$errors" />
        </x-input.section>

        <section class="flex justify-between items-center capitalize">
            <x-button type="primary">login</x-button>
            <x-link href="{{ $forgot_password_route }}" type="http">forgot password?</x-link>
        </section>
    </x-form.form>

    <section class="flex justify-center capitalize">
        <span>don't have an account? <x-link href="{{ $register_route }}" type="http">register</x-link></span>
    </section>
</x-container>
@endsection