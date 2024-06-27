@props(['title'])
{{--the props is for using the title to change the name of the page in the browser tab--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> {{ $title ?? '' }} - {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-black ">
        <x-banner />

    @include('layouts.inc.header')

    @yield('welcome') {{--Get the section named welcome--}}
    <main class="container mx-auto px-5 flex flex-grow ">
        {{ $slot }}
    </main>
        
        @stack('modals')

        @livewireScripts
    </body>
</html>