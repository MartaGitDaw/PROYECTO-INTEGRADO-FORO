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

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-300">
        @livewire('navigation-menu')
        <!-- Page Content -->
        <main>
            <div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
                {{-- Barra de Navegación lateral ('Alpine.js') --}}
                <div @click.away="open = false"
                    class="flex flex-col flex-shrink-0 w-full text-gray-700 bg-white md:w-64 dark:text-gray-200 dark:bg-gray-800"
                    x-data="{ open: false }">
                    <div class="flex flex-row items-center justify-between flex-shrink-0 px-8 py-4">
                        <a href="#"
                            class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark:text-white focus:outline-none focus:shadow-outline">
                            Dashboard
                        </a>
                    </div>
                    <nav :class="{ 'block': open, 'hidden': !open }"
                        class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto">
                        {{-- <x-jet-nav-link>Categories</x-jet-nav-link> --}}
                    </nav>
                </div>
                {{-- Contenido --}}
                <div class="flex w-full">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
