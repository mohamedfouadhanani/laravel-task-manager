@extends('layout')

@section('title', $task->title)

@section('content')
<x-container class="p-4">
    <x-task :task="$task"></x-task>
</x-container>
@endsection