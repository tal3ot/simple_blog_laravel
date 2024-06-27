@props(['reviewer'])

<img class="w-7 h-7 rounded-full mr-3" src="{{ $reviewer->profile_photo_url }}" alt="{{ $reviewer->name }}">
<span class="mr-1 text-white">{{ $reviewer->name }}</span>