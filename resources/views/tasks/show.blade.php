@extends('layout')

@section('title', $task->title)

@php
    $task_edit_route = route('tasks.edit', $task);
    $back_route = route('tasks.index');
    $delete_route = route('tasks.delete', $task);
    $participants_route = route('tasks.participants.index', $task);
@endphp

@section('content')
    <section>
        <span>{{ $task->title }}</span>
        <span>{{ $task->description }}</span>
        <span>{{ $task->status }}</span>
        <a href="{{ $participants_route }}">participants</a>
        <a href="{{ $task_edit_route }}">edit</a>
        <a href="{{ $back_route }}">back</a>
        <form action="{{ $delete_route }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="delete">
        </form>
    </section>
@endsection