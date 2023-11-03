@props(["name", "type", "placeholder" => "", "value" => "", "errors", "autocomplete" => "off", 'is_readonly' => false])

@php
    $has_error = $errors->has($name);
@endphp

<input 
    @class(["rounded", "border-red-600" => $has_error, "border-gray-300" => !$has_error, "bg-gray-50" => $is_readonly])
    id="{{ $name }}" 
    type="{{ $type }}" 
    name="{{ $name }}" 
    value="{{ $value }}" 
    placeholder="{{ $placeholder }}" 
    autocomplete={{ $autocomplete }}
    @readonly($is_readonly)
/>