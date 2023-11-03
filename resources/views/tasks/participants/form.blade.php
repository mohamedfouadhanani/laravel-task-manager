@extends('layout')

@section('title', 'Include a User')

@php
    $form_route = route('tasks.participants.include', $task);
    $back_route = route('tasks.show', $task);

    $email = old('email');
@endphp

@section('content')
<x-container class="p-4">
    <x-form.form action="{{ $form_route }}" method="post" class="mb-4 w-full sm:w-1/2 mx-auto">
        @csrf
        <x-input.section name="email" label="email">
            <x-input.field type="email" name="email" placeholder="Enter the participants email" :value="$email" :errors="$errors" autocomplete="on" />
        </x-input.section>

        <x-input.section name="role" label="role">
            <x-select name="role">
                @foreach ($roles as $role)
                    <option value="{{ $role }}">{{ $role }}</option>
                @endforeach
            </x-select>
        </x-input.section>
        
        <x-form.action-section back_link="{{ $back_route }}" text="include" />
    </x-form.form>
</x-container>
@endsection