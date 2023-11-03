@props(['class' => ''])

<section @class(['mx-auto max-w-6xl', $class])>
    {{ $slot }}
</section>