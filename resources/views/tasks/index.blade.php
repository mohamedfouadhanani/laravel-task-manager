@extends('layout')

@section('title', 'Tasks')

@php
    $create_route = route('tasks.create');
@endphp

@section('content')
    <x-container class="p-4 space-y-4">
        <x-page-header resource="tasks">
            <x-link-as-button href="{{ $create_route }}" icon="fa-solid fa-plus">create</x-link-as-button>
        </x-page-header>
        @foreach ($tasks as $task)
        <x-task :task="$task"></x-task>
        @endforeach
    </x-container>
@endsection