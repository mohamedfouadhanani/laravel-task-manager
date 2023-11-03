@extends('layout')

@section('title', $task->exists ? 'Update a Task' : 'Create a Task')

@php
    $form_route = route($task->exists ? 'tasks.update' : 'tasks.store', $task);
    $back_route = route($task->exists ? 'tasks.show' : 'tasks.index', $task);

    $title = old("name", $task->title);
    $description = old("description", $task->description);
@endphp

@section('content')
<x-container class="p-4">
    <x-form.form action="{{ $form_route }}" method="post" class="mb-4 w-full sm:w-1/2 mx-auto">
        @csrf
        @method($task->exists ? 'PUT' : 'POST')
        <x-input.section name="title" label="title">
            <x-input.field type="text" name="title" placeholder="Enter the tasks title" :value="$title" :errors="$errors" />
        </x-input.section>

        <x-input.section name="description" label="description">
            <x-textarea name="description" placeholder="Enter the tasks description" :value="$description" :errors="$errors" />
        </x-input.section>

        <x-input.section name="status" label="status">
            <x-select name="status">
                @foreach ($statuses as $status)
                    <option value="{{ $status }}" @selected($task->exists && $task->status === $status)>{{ $status }}</option>
                @endforeach
            </x-select>
        </x-input.section>
        
        <x-form.action-section back_link="{{ $back_route }}" text="{{ $task->exists ? 'Update' : 'Create' }}" />
    </x-form.form>
</x-container>
@endsection