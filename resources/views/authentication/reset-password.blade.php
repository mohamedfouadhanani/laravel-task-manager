@extends('layout')

@section("title", "Reset Your Password")

@php
    $reset_password_route = route("password.update");
@endphp

@section('content')
    <form action="{{ $reset_password_route }}" method="post">
        @csrf
        <input type="hidden" value="{{ $request->email }}" name="email">
        <input type="hidden" value="{{ $request->route("token") }}" name="token">

        <input type="password" name="password" placeholder="enter the new password">
        <input type="password" name="password_confirmation" placeholder="confirm your password">

        <input type="submit" value="reset">
    </form>
@endsection