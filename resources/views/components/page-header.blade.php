@props(["resource"])

<section class="flex justify-between items-center">
    <h1 class="block font-bold text-xl capitalize">{{ $resource }}</h1>
    <section class="space-x-2">
        {{ $slot }}
    </section>
</section>