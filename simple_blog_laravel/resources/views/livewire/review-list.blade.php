<div class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-white/10">
        <div class="text-yellow text-2xl">
            @if ($this->activeGenre || $search)
            <button class="text-gray-500 text-xs mr-3" wire:click="clearFilters()">X</button>
            @endif
            {{--type what you're searching for --}}
            @if ($search)
            Results for <strong>{{ $search }}</strong>.
            @endif
            {{--type what genre you clicked on --}}
            @if($this->activeGenre)
            <x-badge wire:navigate href="{{ route('reviews.index', ['genre' => $this->activeGenre->slug])}}" textColor="{{ $this->activeGenre->text_color }}" bgColor="{{ $this->activeGenre->bg_color }}">
                All Reviews of: {{ $this->activeGenre->title }}
            </x-badge>
            @endif
        </div>
        <div class="flex items-center space-x-4 font-light ">
            <x-checkbox wire:model.live="popular"/>
            <x-label class="text-white">Popular</x-label>
            <button class="{{ $sort=== 'desc' ? 'text-yellow border-b border-red' : 'text-gray-500' }} py-4" wire:click="setSort('desc')">Latest</button>
            <button class="{{ $sort=== 'asc' ? 'text-yellow border-b border-red' : 'text-gray-500' }} py-4" wire:click="setSort('asc')">Oldest</button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->reviews as $review) 
        <x-reviews.review-item wire:key="$review->id" :review="$review" /> 
        @endforeach
    </div>

    <div class="my-5">
        {{ $this->reviews->onEachSide(1)->links() }}
    </div>
</div>