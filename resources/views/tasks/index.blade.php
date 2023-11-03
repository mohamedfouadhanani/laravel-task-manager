@extends('layout')

@section('title', 'Tasks')

@php
    $create_route = route('tasks.create');
@endphp

@section('content')
    <a href="{{ $create_route }}">create</a>
    @foreach ($tasks as $task)
        @php
            $task_view_route = route('tasks.show', $task);
            $task_edit_route = route('tasks.edit', $task);
            $delete_route = route('tasks.delete', $task);
            $participants_route = route('tasks.participants.index', $task);
        @endphp
    
        <section>
            <span>{{ $task->title }}</span>
            <span>{{ $task->description }}</span>
            <span>{{ $task->status }}</span>
            <a href="{{ $participants_route }}">participants</a>
            <a href="{{ $task_view_route }}">view</a>
            <a href="{{ $task_edit_route }}">edit</a>
            <form action="{{ $delete_route }}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="delete">
            </form>
        </section>
    @endforeach
@endsection