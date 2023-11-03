@props(["name", "type", "placeholder", "value" => "", "errors"])

@php
    $has_error = $errors->has($name);
@endphp

<textarea @class(["rounded", "border-red" => $has_error, "border-gray-300" => !$has_error]) placeholder="{{ $placeholder }}" name="{{ $name }}" id="{{ $name }}">{{ $value }}</textarea>