@props(["name", "errors"])

@php
    $has_error = $errors->has($name);
@endphp

<select name="{{ $name }}" id="{{ $name }}" class="border-gray-300 rounded">
    {{ $slot }}
</select>