<nav class="flex items-center justify-between py-3 px-6 border-b  text-red border-white/10">
    <div id="nav-left" class="flex items-center">
        <a href="{{ route('home') }}">
            <x-application-mark />
        </a>
        <div class="top-menu ml-10">
            <div class="flex space-x-4">
                <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Home') }} 
                </x-nav-link>

                <x-nav-link href="{{ route('reviews.index') }}" :active="request()->routeIs('reviews.index')">
                    {{ __('Blog') }}
                </x-nav-link>

            </div>
        </div>
    </div>
    <div id="nav-right" class="flex items-center md:space-x-6 ">
        @auth
            @include('layouts.inc.header-auth')
        @else
            @include('layouts.inc.header-guest')
        @endauth
    </div>
</nav>