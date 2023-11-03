@props(['form_route', 'method'])

<form action="{{ $form_route }}" method="{{ $method }}">
    {{ $slot }}
</form>