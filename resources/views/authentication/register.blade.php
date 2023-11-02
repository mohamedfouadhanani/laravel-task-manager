@extends('layout')

@section('title', 'Register')

@php
    $register_route = route("register");
    $login_route = route("login");
@endphp

@section('content')
    <form action="{{ $register_route }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="enter your name">
        <input type="email" name="email" placeholder="enter your email">
        <input type="password" name="password" placeholder="enter your password">
        <input type="password" name="password_confirmation" placeholder="confirm your password">

        <input type="submit" value="register">
    </form>
    <a href="{{ $login_route }}">login</a>
@endsection