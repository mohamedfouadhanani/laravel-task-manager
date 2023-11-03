@extends('layout')

@section("title", "Email Verification")

@php
    $verification_route = route("verification.send");
@endphp

@section('content')
<x-container class="p-4">
    <form action="{{ route("verification.send") }}" method="post" class="inline text-xl capitalize">
        @csrf
        <span>you must verify your email address, please check your email for the verification link</span>
        <x-button type="primary">resend email</x-button>
    </form>
</x-container>
@endsection