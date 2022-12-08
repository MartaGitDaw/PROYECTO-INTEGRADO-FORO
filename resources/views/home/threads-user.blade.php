<x-app-layout>
    @foreach ($threads as $thread)
        @if ($thread->user_id == $user->id)
            <div class="container mx-auto mt-12 lg:mt-8 px-4 p-8 sm:px-8 flex shrink justify-center min-h-screen">
                <div class="p-8 rounded overflow-hidden border w-full bg-white">
                    <div class="w-full flex justify-between p-3">
                        <div class="flex">
                            <div
                                class="rounded-full h-8 w-8 bg-gray-500 flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('storage/' . $thread->user->profile_photo_path) }}"
                                    alt=" {{ Str::substr($thread->user->name, 0, 1) }}">
                            </div>
                            <span class="pt-1 ml-2 font-bold text-sm">{{ $thread->user->name }}</span>
                        </div>
                        {{-- <a href="{{route('show.threads', $thread->category_id)}}" class="px-2 hover:bg-gray-300 cursor-pointer rounded"> --}}
                        <a href="{{ route('threads.category', $thread->category) }}"
                            class="px-2 hover:bg-gray-300 cursor-pointer rounded">
                            <i class="pt-2 text-lg">{{ $thread->category->name }}</i>
                        </a>
                    </div>
                    <img class="w-full bg-cover" src="{{ asset('storage/' . $thread->image) }}">
                    <div class="px-3 pb-2">
                        <div class="pt-2">
                            <i class="cursor-pointer">{{ $thread->title }}</i>
                            {{-- <span class="text-sm text-gray-400 font-medium">12 likes</span> --}}
                        </div>
                        <div class="pt-1">
                            <div class="mb-2 text-sm">
                                <span class="font-medium mr-2 text-sky-700">{{ $thread->user->name }}</span>
                                {{ $thread->description }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</x-app-layout>
