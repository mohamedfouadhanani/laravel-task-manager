@props(["method", "action", "class" => "", "enctype" => ""])

<form class="shadow ring-1 ring-gray-200 p-4 rounded {{ $class }}" action="{{ $action }}" method="{{ $method }}" enctype="{{ $enctype }}">
    {{ $slot }}
</form>