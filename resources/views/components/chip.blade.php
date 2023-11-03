@props(["type" => "basic", 'class' => ''])

@php
    $classes = [
        "basic" => "bg-gray-100 ring-gray-300 text-gray-600",
        "warning" => "bg-yellow-100 ring-yellow-300 text-yellow-600",
        "info" => "bg-blue-100 ring-blue-300 text-blue-600",
        "success" => "bg-green-100 ring-green-300 text-green-600",
        "danger" => "bg-red-100 ring-red-300 text-red-600",
    ]
@endphp

<span @class(['cursor-default ring-1 text-xs rounded-md capitalize font-medium px-1 py-0', $classes[$type], $class])>
    {{ $slot }}
</span>