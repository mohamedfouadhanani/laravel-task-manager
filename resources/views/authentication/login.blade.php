@extends('layout')

@section('title', 'Login')

@php
    $register_route = route("register");
    $forgot_password_route = route("password.request");
    $login_route = route("login");
@endphp

@section('content')
    <form :action="$login_route" method="post">
        @csrf
        <input type="email" name="email" placeholder="enter your email">
        <input type="password" name="password" placeholder="enter your password">

        <input type="submit" value="login">
    </form>
    <a href="{{ $forgot_password_route }}">forgot password</a>
    <a href="{{ $register_route }}">register</a>
@endsection