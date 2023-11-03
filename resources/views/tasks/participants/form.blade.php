@extends('layout')

@section('title', 'Include a User')

@php
    $form_route = route('tasks.participants.include', $task);
    $back_route = route('tasks.show', $task);

    $email = old('email');
@endphp

@section('content')
    <form action="{{ $form_route }}" method="post">
        @csrf

        <input type="email" name="email" placeholder="enter the user's email" value="{{ $email }}">
        @error('email')
            <span>{{ $message }}</span>
        @enderror

        <select name="role">
            @foreach ($roles as $role)
                <option value="{{ $role }}">{{ $role }}</option>
            @endforeach
        </select>

        <input type="submit" value="include">
    </form>
    <a href="{{ $back_route }}">back</a>
@endsection