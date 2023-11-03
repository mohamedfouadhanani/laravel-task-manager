@extends('layout')

@section("title", "Forgot Password")

@php
    $email = old("email");

    $forgot_password_route = route("password.request");
    $back_link = route("login");
@endphp

@section('content')
<x-container class="p-4">
    <x-form.form action="{{ $forgot_password_route }}" method="post" class="mb-4 w-full sm:w-1/2 mx-auto">
        @csrf
        <x-input.section name="email" label="email">
            <x-input.field type="email" name="email" placeholder="Enter your email" :value="$email" :errors="$errors" />
        </x-input.section>

        <x-form.action-section back_link="{{ $back_link }}" text="reset" />
    </x-form.form>
</x-container>
@endsection