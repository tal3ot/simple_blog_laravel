<div class="mt-10 comments-box border-t border-gray-100 pt-10">
    <h2 class="text-2xl font-semibold text-yellow mb-5">Discussions</h2>
    @auth
    <textarea wire:model="comment" class="w-full rounded-lg p-4 bg-gray-50 focus:outline-none text-sm text-gray-700 border-gray-200 placeholder:text-gray-400" cols="30" rows="7"></textarea>
    <div class="flex justify-between py-3">
        <input type="file" wire:model="comment_img" class="mt-3 text-white/50" accept="image/*">
        @error('comment_img') <span class="text-red-500">{{ $message }}</span> @enderror

        <button wire:click="reviewComment" class="mt-3 inline-flex items-center justify-center h-10 px-4 font-medium tracking-wide text-white transition duration-200 bg-red rounded-lg transform transition-transform duration-300 hover:scale-105 focus:outline-none">
            Post Comment
        </button>
    </div>

    @else
    <a wire:navigate class="text-red underline py-1" href="/login"> Login to Post Comments</a>
    @endauth

    <div class="user-comments px-3 py-2 mt-5">
        {{--using forelse so we can use if empty --}}
        @forelse($this->comments as $comment)
        <div class="comment [&:not(:last-child)]:border-b border-white/10 py-5">
            <div class="user-meta flex mb-4 text-sm items-center">
                <x-reviews.reviewer :reviewer="$comment->user" />
                <span class="text-gray-500">. {{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <div class="text-justify text-white/60  text-sm">
                {{ $comment->comment }}
            </div>
            @if($comment->comment_img)
            <img src="{{ Storage::url($comment->comment_img) }}" alt="Comment Image" class="mt-3">
            @endif
        </div>
        @empty
        <div class="text-red text-center">
            <span> No Comments Posted</span>
        </div>
        @endforelse
    </div>
    <div class="my-2">
        {{ $this->comments->links() }}
    </div>
</div>