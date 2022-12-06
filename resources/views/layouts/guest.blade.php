<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <nav x-data="{ open: false }"
        class="fixed w-full top-0 border-b text-gray-700 bg-white dark:text-gray-200 dark:bg-gray-800 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('welcome') }}">
                            {{-- <img src="{{ asset('storage/logo/logo.png') }}" class="block h-9 w-auto"> --}}
                            <x-jet-application-mark class="block h-9 w-auto" />
                        </a>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            {{-- <x-foro-nav-link href="#" :active="request()->routeIs('admin*')"> --}}
                            <label class="text-sm font-medium leading-5 text-gray-900 dark:text-blue-500">Foro</label>
                        </div>
                    </div>
                </div>
                <div class="py-4 px-2 flex flex-row-reverse text-sm mx-12">
                    @if (Route::has('login'))
                        <div class="top-0 block">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                                    in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <div class="mt-12">
        {{ $slot }}
    </div>
</body>

</html>