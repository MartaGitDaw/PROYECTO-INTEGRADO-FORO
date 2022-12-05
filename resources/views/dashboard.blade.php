<x-app-layout>
    {{-- <a href="{{route ('admin.index')}}" class="hover:underline"><small class="text-sm text-gray-500">admin</small></a>
            >
            <a href="#" class="hover:underline"><small class="text-sm text-gray-500">users</small></a> --}}
    <!-- component -->
    @foreach ($threads as $thread)
        <div class="container mx-auto px-4 py-8 sm:px-8 flex justify-center">
            <div class="rounded overflow-hidden border w-full lg:w-8/12 md:w-8/12 bg-white mx-3 md:mx-0 lg:mx-0">
                <div class="w-full flex justify-between p-3">
                    <div class="flex">
                        <div class="rounded-full h-8 w-8 bg-gray-500 flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('storage/' . $thread->user->profile_photo_path) }}"
                                alt="{{Str::substr($thread->user->name, 0, 1) }}">
                        </div>
                        <span class="pt-1 ml-2 font-bold text-sm">{{ $thread->user->name }}</span>
                    </div>
                    <a href="#" class="px-2 hover:bg-gray-300 cursor-pointer rounded"><i
                            class="fas fa-ellipsis-h pt-2 text-lg">{{ $thread->category->name }}</i></a>
                </div>
                <img class="w-full bg-cover" src="{{ asset('storage/' . $thread->image) }}">
                <div class="px-3 pb-2">
                    <div class="pt-2">
                        <i class="far fa-heart cursor-pointer">{{ $thread->title }}</i>
                        {{-- <span class="text-sm text-gray-400 font-medium">12 likes</span> --}}
                    </div>
                    <div class="pt-1">
                        <div class="mb-2 text-sm">
                            <span class="font-medium mr-2 text-sky-700">{{ $thread->user->name }}</span>
                            {{ $thread->description }}
                        </div>
                    </div>
                    {{-- <div class="text-sm mb-2 text-gray-400 cursor-pointer font-medium">View all 14 comments</div>
                    <div class="mb-2">
                        <div class="mb-2 text-sm">
                            <span class="font-medium mr-2">razzle_dazzle</span> Dude! How cool! I went to New Zealand
                            last summer and had a blast taking the tour! So much to see! Make sure you bring a good
                            camera when you go!
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    @endforeach
    <x-foro-footer></x-foro-footer>
</x-app-layout>
