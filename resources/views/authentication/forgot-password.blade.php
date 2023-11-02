@extends('layout')

@section("title", "Forgot Password")

@php
    $email = old("email");

    $forgot_password_route = route("password.request");
@endphp

@section('content')
    <form action="{{ $forgot_password_route }}" method="post">
        @csrf
        <input type="email" name="email" placeholder="enter your email" value={{ $email }}>

        <input type="submit" value="send">
    </form>
@endsection