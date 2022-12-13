<x-guest-layout>
    <div class="container mx-auto px-4 py-8 sm:px-8 flex shrink justify-center min-h-screen">
        <!-- component -->
        <div class="flex items-center text-gray-800">
            <div class="p-4 w-full">
                <div class="grid grid-cols-12 gap-4">
                    @foreach ($categories as $category)
                    <div class="col-span-12 sm:col-span-6 md:col-span-3">
                        <a href="{{route('show.threads', $category)}}">
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
</x-guest-layout>