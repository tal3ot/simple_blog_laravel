{{--Before login--}}
<x-app-layout title="Home Page">

    @section('welcome')
    
    <div class="w-full text-center py-32 flex flex-col items-center">
        <a href="/">
            <img src="{{ Vite::asset('resources/images/logo.png')}}" alt="" width="300" height="45">
        </a>
        <p class="text-yellow text-lg mt-1 py-2">to the infinity and beyond</p>
        <a class="px-3 py-2 text-lg text-white/80 bg-red rounded mt-5 inline-block font-semibold transform transition-transform duration-300 hover:scale-105" href="/blog">Start
            Reading</a>
    </div>
    @endsection

    <div class="mb-10"> 
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl text-yellow font-bold">Featured Posts</h2>
            <div class="w-full">
                <div class="grid grid-cols-3 gap-10 w-full">
                    @foreach ($featuredReviews as $review)
                    <x-reviews.review-card :review="$review" class="rounded-xl bg-grey border border-orange-500 border-transparent hover:border-blue-800 group transition-colors duration-300" /> 
                    @endforeach
                </div>
            </div>
        </div>
        <hr class="border-b border-white/10">

        <h2 class="mt-16 mb-5 text-3xl text-yellow font-bold">Latest Posts</h2>
        <div class="w-full mb-5">
            <div class="grid grid-cols-3 gap-10 w-full"> {{--for formating the reviews as 3 side by side rather than 1 --}}

                @foreach ($latestReviews as $review)
                <x-reviews.review-card :review="$review" class="rounded-xl bg-grey border border-orange-500 border-transparent hover:border-blue-800 group transition-colors duration-300" /> 
                @endforeach

            </div>
            <a class="mt-10 block text-center text-lg text-yellow font-semibold" href="/blog">More
                Posts</a>
        </div>
</x-app-layout>