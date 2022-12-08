<x-app-layout>
    <div class="container mx-auto px-4 py-4 sm:px-8 flex shrink-0 justify-center min-h-screen">
        <div class="mt-12 lg:mt-5 overflow-hidden w-full lg:w-8/12 mx-3">
            @foreach ($categories as $category)
                    <a href="{{route('threads.category', $category)}}"
                        class='mt-3 flex flex-wrap sm:flex-col justify-center items-center  p-3 bg-white rounded-md shadow-xl border-l-4 border-blue-300'>
                        <div class="font-bold text-5xl">
                            {{ $category->name }}
                        </div>
                    </a>
            @endforeach
        </div>
    </div>
</x-app-layout>