@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-red text-lg font-medium leading-5 focus:outline-none focus:border-red transition duration-150 ease-in-out flex space-x-2 text-yellow' //when active 
            : 'flex space-x-2 items-center hover:text-yellow'; //when not active
@endphp
{{--wire navigate is for smoothly going through the tabs home and blog for example without reloading the page --}}
<a wire:navigate {{ $attributes->merge(['class' => $classes]) }}> 
    {{ $slot }}
</a>
