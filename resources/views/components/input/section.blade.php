@props(['name', "label"])

<section class="flex flex-col space-y-1 mb-4">
    <label for="{{ $name }}" class="capitalize font-semibold">{{ $label }}</label>
    {{ $slot }}
    @error($name)
        <span class="text-xs font-semibold text-red-600">{{$message}}</span>
    @enderror
</section>