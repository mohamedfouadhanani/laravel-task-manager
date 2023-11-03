@props(['task'])

@php
    $task_edit_route = route('tasks.edit', $task);
    $back_route = route('tasks.index');
    $delete_route = route('tasks.delete', $task);
    $participants_route = route('tasks.participants.index', $task);

    $types = [
        'Pending' => "warning",
        'Incomplete' => "danger",
        'Done' => "success",
    ];
    $type = $types[$task->status];
@endphp

<article class="mx-auto w-full sm:w-1/2 ring-2 ring-black rounded-md p-4 space-y-2">
    <section class="flex justify-between items-center">
        <h2 class="block font-semibold text-2xl">{{ $task->title }}</h2>
        <x-chip type="{{ $type }}">{{ $task->status }}</x-chip>
    </section>
    <section class="space-x-2">
        <x-chip class="normal-case" type="basic">{{ $task->owner()->email }}</x-chip>
    </section>
    @unless ($task->description == null)
    <p class="block font-light">
        {{ $task->description }}
    </p>
    @endunless
    <section class="flex items-center justify-between">
        <x-link href="{{ $participants_route }}">participants</x-link>
        <section class="flex items-center justify-between space-x-2">
            <x-link href="{{ $task_edit_route }}">edit</x-link>
            <x-form-as-link :form_route="$delete_route" http_method="post" method="DELETE">delete</x-form-as-link>
            <x-link href="{{ $back_route }}">go back</x-link>
        </section>
    </section>
</article>