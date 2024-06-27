@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-red']) }}>
    {{ $value ?? $slot }}
</label>
