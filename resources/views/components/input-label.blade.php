@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-base font-bold mb-3']) }}>
    {{ $value ?? $slot }}
</label>
