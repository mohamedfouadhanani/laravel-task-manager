@props(["href", "icon" => "", "type" => "basic"])

@php
    $has_icon = $icon != "";

    $classes = [
        "basic" => "bg-gray-800 hover:bg-gray-700",
        "info" => "bg-blue-800 hover:bg-blue-700",
        "danger" => "bg-red-800 hover:bg-red-700",
        "warning" => "bg-yellow-800 hover:bg-yellow-700",
        "success" => "bg-green-800 hover:bg-green-700",
    ];
@endphp

<a href="{{ $href }}" class="rounded px-3 py-2 text-sm shadow-sm capitalize text-white font-semibold {{ $classes[$type] }}">
    @if ($has_icon)
    <i class="{{ $icon }}"></i>
    @endif
    {{ $slot }}
</a>