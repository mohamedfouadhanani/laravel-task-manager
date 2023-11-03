@props(['form_route', 'http_method', 'method', 'class' => ''])

<form action="{{ $form_route }}" method="{{ $http_method }}" @class(['inline', $class])>
    @csrf
    @method($method)
    <x-button type="link">{{ $slot }}</x-button>
</form>