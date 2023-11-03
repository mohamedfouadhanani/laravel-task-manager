@extends('layout')

@section('title', $task->exists ? 'Update a Task' : 'Create a Task')

@php
    $form_route = route($task->exists ? 'tasks.update' : 'tasks.store', $task);
    $back_route = route('tasks.index');

    $task_title = $task->title;
    $task_description = $task->description;
@endphp

@section('content')
    <form action="{{ $form_route }}" method="post">
        @csrf
        @method($task->exists ? 'PUT' : 'POST')

        <input type="text" name="title" placeholder="enter the task's title" value="{{ $task_title }}">
        @error('title')
            <span>{{ $message }}</span>
        @enderror

        <textarea name="description" placeholder="enter the task's description">{{ $task_description }}</textarea>

        <select name="status">
            @foreach ($statuses as $status)
                <option value="{{ $status }}" @selected($task->exists && $task->status === $status)>{{ $status }}</option>
            @endforeach
        </select>

        <input type="submit" value="{{ $task->exists ? 'Update' : 'Create' }}">
    </form>
    <a href="{{ $back_route }}">back</a>
@endsection