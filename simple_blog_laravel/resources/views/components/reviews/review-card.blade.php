@props(['review'])

<div {{ $attributes }} class="md:col-span-1 col-span-3 ">
    <a wire:navigate href="{{ route('reviews.show', $review->slug ) }}">
        <div>
            <img class="w-full rounded-xl transform transition-transform duration-300 hover:scale-105" src="{{ $review->image }}">
        </div>
    </a>
    <div class="mt-3 p-2">
        <div class="flex items-center mb-2 gap-x-2">
            @if ($genre = $review->genres->first()) {{--get the reviews with genre first--}}
            <x-reviews.genre-badge :genre="$genre" />
            @endif
            <p class="text-gray-500 text-sm">{{ $review->published_at }}</p>
        </div>
        <a wire:navigate href="{{ route('reviews.show', $review->slug ) }}" class="block mt-1 text-xl font-bold text-blue-800">{{ $review->title }}</a>
    </div>

</div>