@extends('layout')

@section("title", "Email Verification")

@php
    $verification_route = route("verification.send");
@endphp

@section('content')
    <form action="{{ $verification_route }}" method="post">
        @csrf
        <span>check your email for the verification link</span>
        <input type="submit" value="resend email" />
    </form>
@endsection