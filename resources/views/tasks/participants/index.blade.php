@extends('layout')

@section('title', 'Participants')

@php
    $include_route = route('tasks.participants.create', $task);
    $back_route = route('tasks.show', $task);
@endphp

@section('content')
    <x-container class="p-4 space-y-4">
        <x-page-header resource="participants">
            <x-link-as-button href="{{ $include_route }}" icon="fa-solid fa-plus">create</x-link-as-button>
            <x-link-as-button href="{{ $back_route }}">go back</x-link-as-button>
        </x-page-header>
        @foreach ($task->users as $user)

        @php
            $exclude_route = route('tasks.participants.exclude', $task);
        @endphp
        
        @continue($user->pivot->role == 'Owner')

        <section class="flex justify-between items-center rounded-md ring-2 ring-black p-4">
            <section class="flex-col">
                <h2 class="font-bold capitalize">name</h2>
                <span class="font-light">{{ $user->name }}</span>
            </section>
            <section class="flex-col">
                <h2 class="font-bold capitalize">email</h2>
                <span class="font-light">{{ $user->email }}</span>
            </section>
            <section class="flex-col">
                <h2 class="font-bold capitalize">role</h2>
                <span class="font-light">
                    <x-chip>{{ $user->pivot->role }}</x-chip>
                </span>
            </section>
            <section>
                <x-form-as-button :form_route="$exclude_route" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="email" value="{{ $user->email }}">
                    <x-button type="danger">exclude</x-button>
                </x-form-as-button>
            </section>
        </section>
        @endforeach
    </x-container>
@endsection