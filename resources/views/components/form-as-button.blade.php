@props(['form_route', 'method', 'class' => ''])

<form action="{{ $form_route }}" method="{{ $method }}" @class([$class])>
    {{ $slot }}
</form>