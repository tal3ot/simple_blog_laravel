{{--livewire only have one root element--}}
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
        @foreach ($this->reviews as $review) {{--adding this as I using the computed property if i used a public property of passing it through the render method then we don't  need to use $this--}}
        <x-reviews.review-item wire:key="$review->id" :review="$review" /> {{--this wire key is usually used to prevent some bugs or issues like the tag genres still while we change the pages or the like button doesn't change when we go to another page and also laravel tries to minimize the number of elements reloads so it doesn't always refresh the entire page content it only changes the things that have to change and some time it's not smart enough and can't really tell what has to change and it breaks so adding wire key hopefully fixes those issues, always try to put it in the loops ...etc--}}
        @endforeach
    </div>

    <div class="my-5">
        {{ $this->reviews->onEachSide(1)->links() }}
    </div>
</div>