@props(['active'])

@php
$classes = ($active ?? false)
            // ? ' block px-1 py-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-100 hover:text-gray-100 hover:border-gray-300 focus:outline-none focus:text-blue-700 focus:border-gray-300 transition'
            // : ' block px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-400 hover:text-gray-100 hover:border-gray-300 focus:outline-none focus:text-blue-700 focus:border-gray-300 transition';
            ? ' block px-1 py-1 border-b-2 border-transparent text-sm font-medium leading-5 text-blue-600 hover:border-blue-600 hover:text-gray-500 focus:outline-none transition'
            : ' block px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-400 hover:border-blue-600 hover:text-gray-500 focus:outline-none transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
