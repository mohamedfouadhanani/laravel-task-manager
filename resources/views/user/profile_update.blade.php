@extends('layout')

@section('title', 'Profile Update')

@php
    $profile_update_route = route("user-profile-information.update");

    $name = auth()->user()->name;
    $email = auth()->user()->email;
@endphp

@section('content')
    <form action="{{ $profile_update_route }}" method="post">
        @csrf
        @method("PUT")

        <input type="text" name="name" placeholder="enter your name" value="{{ $name }}">
        <input type="text" name="email" placeholder="enter your email" value="{{ $email }}">

        <input type="submit" value="update">
    </form>
@endsection