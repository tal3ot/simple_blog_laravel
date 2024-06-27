@props(['genre'])

<x-badge wire:navigate href="{{ route('reviews.index', ['genre' => $genre->slug])}}" textColor="{{ $genre->text_color }}" bgColor="{{ $genre->bg_color }}" >
    {{ $genre->title }}
</x-badge>