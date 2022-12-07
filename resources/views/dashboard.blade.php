<x-app-layout>
    @foreach ($threads as $thread)
        <div class="container mx-auto py-4 flex justify-center lg:justify-between">
            <x-foro-navbar></x-foro-navbar>
            <div class="mt-5 rounded overflow-hidden border w-full lg:w-8/12 md:w-8/12 bg-white">
                <div class="w-full flex justify-between p-3">
                    <div class="flex">
                        <a href="">
                            <div
                                class="rounded-full h-8 w-8 bg-gray-500 flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('storage/' . $thread->user->profile_photo_path) }}"
                                    alt="{{ Str::substr($thread->user->name, 0, 1) }}">
                            </div>
                            <span class="pt-1 ml-2 font-bold text-sm">{{ $thread->user->name }}</span>
                        </a>
                    </div>
                    <a href="{{ route('threads.category', $thread->category) }}"
                        class="px-2 hover:bg-gray-300 cursor-pointer rounded"><i
                            class="pt-2 text-lg">{{ $thread->category->name }}</i></a>
                </div>
                <img class="w-full bg-cover" src="{{ asset('storage/' . $thread->image) }}">
                <div class="px-3 pb-2">
                    <div class="pt-2">
                        <i class="cursor-pointer">{{ $thread->title }}</i>
                        {{-- <span class="text-sm text-gray-400 font-medium">12 likes</span> --}}
                    </div>
                    <div class="pt-1">
                        <div class="mb-2 text-sm">
                            <a href="{{ route('threads.user', $thread->user) }}"
                                class="font-medium mr-2 text-sky-700">{{ $thread->user->name }}</a>
                            {{ $thread->description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <x-foro-footer></x-foro-footer>
</x-app-layout>
