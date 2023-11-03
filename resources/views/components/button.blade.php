@props(['class' => '', 'id' => '', 'type' => 'primary'])

@php
    $classes = [
        "primary" => "bg-gray-800 text-white hover:bg-gray-700 focus:ring-2 focus:ring-gray-700 focus:ring-offset-2",
        "danger" => "bg-red-800 text-white hover:bg-red-700 focus:ring-2 focus:ring-red-700 focus:ring-offset-2",
        "secondary" => "bg-transparent ring-1 ring-gray-800 text-primary-800 hover:bg-primary-50 focus:bg-primary-100",
        "link" => "p-0 bg-transparent hover:underline"
    ];
@endphp

<button @class(['px-3 py-2 rounded capitalize', $class, $classes[$type]]) id="{{ $id }}">
    {{ $slot }}
</button>