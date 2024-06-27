<x-app-layout title="Blog">
    <div class="w-full grid grid-cols-4 gap-10">
        <div class="md:col-span-3 col-span-4">
            <livewire:review-list />
        </div>
        <div id="side-bar" class="border-t border-t-white/10 md:border-t-none col-span-4 md:col-span-1 px-3 md:px-6 space-y-10 py-6 pt-10 md:border-l border-white/10 h-screen sticky top-0">
            <livewire:search-box />

            @include('reviews.inc.genres-box')
        </div>
    </div>

</x-app-layout>