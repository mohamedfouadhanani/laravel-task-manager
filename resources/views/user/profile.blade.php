@extends('layout')

@section('title', 'Profile Update')

@php
    $profile_update_route = route("user-profile-information.update");
    $back_link = route("tasks.index");

    $name = auth()->user()->name;
    $email = auth()->user()->email;
@endphp

@section('content')
    <x-container class="p-4">
        <x-form.form action="{{ $profile_update_route }}" method="post" class="mb-4 w-full sm:w-1/2 mx-auto">
            @csrf
            @method("PUT")
            <x-input.section name="name" label="name">
                <x-input.field type="text" name="name" placeholder="Enter your name" :value="$name" :errors="$errors" />
            </x-input.section>
    
            <x-input.section name="email" label="email">
                <x-input.field is_readonly={{true}} autocomplete="on" type="email" name="email" placeholder="Enter your email" :value="$email" :errors="$errors" />
            </x-input.section>
    
            <section class="flex justify-between items-center capitalize">
                <x-button type="primary">update</x-button>
                <x-link href="{{ $back_link }}" type="http">go back</x-link>
            </section>
        </x-form.form>
    </x-container>
@endsection