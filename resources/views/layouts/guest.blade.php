<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FORO::Proyecto Integrado</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />


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
                            <img src="{{ asset('storage/logo/logo.png') }}"
                                class="block h-9 w-auto bg-blue-500 rounded-full">
                        </a>
                        <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <a href="{{route('welcome')}}" class="ml-3 text-sm font-medium leading-5 text-gray-900 dark:text-blue-500 hover:text-gray-500">Threads</a>
                        </div>
                        <a href="{{route('show.categories')}}" class="ml-3 text-sm font-medium leading-5 text-gray-900 dark:text-blue-500 hover:text-gray-500">Categories</a>
                    </div>
                </div>
                <div class="shrink-0 flex items-center">
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
    <!-- Page Content -->
    <div class="flex-1 mt-12">
        {{ $slot }}
        <x-foro-footer></x-foro-footer>
    </div>

</body>

</html>
