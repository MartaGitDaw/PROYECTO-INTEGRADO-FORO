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

    {{-- CDN SweetAlert2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="relative flex min-h-screen">
        @livewire('navigation-menu')
        <div class="lg:w-64">
            <x-foro-navbar></x-foro-navbar>
        </div>
        <!-- Page Content -->
        <div class="flex-1">
            {{ $slot }}
            <x-foro-footer></x-foro-footer>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
    {{-- SweetAlert2 --}}
    {{-- Si existe la variable de sesion info --}}
    @if (session('info'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ session('info') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
</body>

</html>
