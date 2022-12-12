<x-app-layout>
    <div class="px-4 sm:px-8 flex mt-12 lg:mt-4 w-full justify-center">
        <div class="overflow-hidden w-full mt-4 lg:mt-0">
            <nav class="text-blue-500 text-xs mt-5 lg:mt-0">
                <a href="{{route('dashboard')}}" class="hover:underline">dashboard</a>
                >
                <a href="{{ route('categories') }}">categories</a>
            </nav>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8 sm:px-8 flex shrink justify-center min-h-screen">
        <!-- component -->
        <div class="flex items-center text-gray-800">
            <div class="p-4 w-full">
                <div class="grid grid-cols-12 gap-4">
                    @foreach ($categories as $category)
                    <div class="col-span-12 sm:col-span-6 md:col-span-3">

                        <a href="{{route('threads.category', $category)}}">
                            <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-blue-500">
                                    <i class="fas fa-stream"></i>
                                </div>
                                <div class="flex flex-col flex-grow ml-4">
                                    <div class="text-sm text-gray-500"> {{ $category->name }}</div>
                                    <div class="font-bold text-lg">{{ $category->threads->count() }}</div>
                                </div>
                            </div>
                        </a>

                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>