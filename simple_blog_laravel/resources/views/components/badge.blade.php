@props(['textColor', 'bgColor'])

@php
    $textColor = match ($textColor) {
        'gray' => 'text-gray-100',
        'blue' => 'text-blue-800',
        'red' => 'text-red',
        'yellow' => 'text-yellow',
        'pink' => 'text-pink-800',
        'indigo' => 'text-indigo-800',
        'purple' => 'text-purple-800',
        'green' => 'text-green-800',
        'lime' => 'text-lime-800',
        'orange' => 'text-orange-800',
        'gold' => 'text-gold-800',
        'white' => 'text-white',
        default => 'text-gray-800',
    };
    
    $bgColor = match ($bgColor) {
        'gray' => 'bg-gray-800',
        'blue' => 'bg-blue-800',
        'red' => 'bg-red',
        'yellow' => 'bg-yellow',
        'brown' => 'bg-teal-800',
        'pink' => 'bg-pink-800',
        'indigo' => 'bg-green-200',
        'purple' => 'bg-purple-800',
        'green' => 'bg-green-800',
        'lime' => 'bg-lime-800',
        'orange' => 'bg-orange-500',
        'gold' => 'bg-amber-500',
        'white' => 'bg-white',
        'rose' => 'bg-rose-950',
        default => 'bg-gray-800',
    };
@endphp

<button {{ $attributes }} class="{{ $textColor }} {{ $bgColor }} rounded-xl px-3 py-1 text-base inline-block font-semibold transform transition-transform duration-300 hover:scale-105">
    {{ $slot }}</button>