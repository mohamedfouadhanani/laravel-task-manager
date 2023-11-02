@extends('layout')

@section('title', 'Profile')

@php
    $profile_edit_route = route("profile.edit");
@endphp

@section('content')
    <span>{{ auth()->user()->name }}</span>
    <span>{{ auth()->user()->email }}</span>
    <a href="{{ $profile_edit_route }}">edit</a>
@endsection