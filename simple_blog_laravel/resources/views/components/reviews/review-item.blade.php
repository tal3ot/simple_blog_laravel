{{--blog page--}}
@props(['review'])

<article {{ $attributes->merge(['class' => '[&:not(:last-child)]:border-b border-white/10 pb-10 bg-grey transform transition-transform duration-300 hover:scale-105']) }}>
    <div class="article-body grid grid-cols-12 gap-3 mt-5 items-start">
        <div class="article-thumbnail col-span-4 flex items-center">
            <a wire:navigate href="{{ route('reviews.show', $review->slug ) }}"> {{--if the image doesn't show se this asset('storage/' . $review->image)--}}
                <img class="mw-100 mx-auto rounded-xl transform transition-transform duration-300 hover:scale-105" src="{{ $review->image }}" alt="thumbnail">
            </a>
        </div>
        <div class="col-span-8">
            <div class="article-meta flex py-1 text-sm items-center">
                <x-reviews.reviewer :reviewer="$review->reviewer" />
                <span class="text-gray-500 text-sm">. {{ $review->published_at->diffForHumans() }} </span> {{--diffforhumans is for writing this type of time 2 days age --}}
            </div>
            <h2 class="text-xl font-bold text-blue-800">
                <a wire:navigate href="{{ route('reviews.show', $review->slug ) }}">
                    {{ $review->title }}
                </a>
            </h2>

            <p class="mt-2 text-base text-white/60 font-light">
                {{ $review->excerpt() }}
            </p>
            <div class="article-actions-bar mt-6 flex items-center justify-between">
                <div class="flex gap-x-2">
                    @foreach ($review->genres as $genre)
                    <x-reviews.genre-badge :genre="$genre" />
                    @endforeach
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-500 text-sm">{{ $review->readingTime() }} min read</span>
                    </div>
                </div>
                <div>
                    <livewire:like-button :key="'likebutton-' . $review->id" :$review /> {{--the key to show the like button on all pages and be live, and post will go and update public function and also this wire key is usually used to prevent some bugs or issues like the tag genres still be from the previuous page or the like button doesn't change when we go to another page ...etc  --}}
                </div>
            </div>
        </div>
    </div>
</article>