@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-base font-bold ']) }}>
    {{ $value ?? $slot }}
</label>
