<div class="flex space-x-5">
    <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
        {{ __('Login') }} {{--the __ if for giving the ability to translate what's comes after it--}}
    </x-nav-link>


    <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
        {{ __('Register') }} {{--the __ if for giving the ability to translate what's comes after it--}}
    </x-nav-link>
</div>