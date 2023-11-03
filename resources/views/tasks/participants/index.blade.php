@extends('layout')

@section('title', 'Participants')

@php
    $include_route = route('tasks.participants.create', $task);
    $back_route = route('tasks.show', $task);
@endphp

@section('content')
    <a href="{{ $include_route }}">include</a>
    <a href="{{ $back_route }}">back</a>
    @foreach ($task->users as $user)
        @php
            $exclude_route = route('tasks.participants.exclude', $task);
        @endphp
        <span>{{ $user->name }}</span>
        <span>{{ $user->email }}</span>
        <span>({{ $user->pivot->role }})</span>
        
        @continue($user->pivot->role == 'Owner')
        
        <form action="{{ $exclude_route }}" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" name="email" value="{{ $user->email }}">
            <input type="submit" value="exclude">
        </form>
    @endforeach
@endsection