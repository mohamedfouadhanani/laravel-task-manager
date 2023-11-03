@props(['href', 'class' => ''])

<a href="{{ $href }}" @class(['capitalize hover:underline', $class])>{{ $slot }}</a>