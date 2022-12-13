<x-app-layout>
    <div class=" px-4 sm:px-8 flex mt-12 lg:mt-4 w-full justify-center">
        <div class="overflow-hidden w-full mt-4 lg:mt-0">
            <nav class="text-blue-500 text-xs mt-5 lg:mt-0">
                <span class="hover:underline">Dashboard</span>
            </nav>
        </div>
    </div>
    <x-container>
        @foreach ($threads as $thread)
            <div class="mx-auto flex justify-center max-w-3xl md:mb-8 mt-4 bg-white rounded-lg items-center  md:p-0 p-8 shadow-2xl"
                x-data="{
                    comment: false,
                }">
                <div class="h-full w-full   m-3">
                    <div class="py-2 px-2">
                        <div class="flex justify-between items-center py-2">
                            <div class=" mt-1 flex">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
                                        <img src="{{ asset('storage/' . $thread->user->profile_photo_path) }}"
                                            alt="{{ Str::substr($thread->user->name, 0, 1) }}"
                                            class="rounded-full h-10 w-10 flex items-center justify-center mr-3 border-2 border-blue-500">
                                    </div>
                                    <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $thread->user->name }}
                                            </p>
                                        <button
                                            class="text-indigo-500 text-sm capitalize flex justify-start items-start">•
                                            follow
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <span class="text-2xl ">{{ $thread->category->name }}</span>
                                @foreach ($thread->user->roles as $role)
                                    @if ($role->name == 'moderator')
                                        <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                                            MODERATOR
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="m-3">
                        <h2 class="text-2xl bold text-blue-500">{{ $thread->title }}</h2>
                    </div>
                    @if (isset($thread->image))
                        <div class=" flex justify-center mb-3">
                            <img src="{{ asset('storage/' . $thread->image) }}" alt="saman"
                                class="rounded-lg  object-cover">
                        </div>
                    @endif
                    <div>
                        {{ $thread->description }}
                    </div>
                    <div class="">
                        <!-- System Like and tools Feed -->
                        <div class="flex justify-between items-start p-2 py-">
                            <div class="flex space-x-2 items-center">
                                <livewire:like-thread :thread="$thread"/>
                                <button type="button" class="focus:outline-none Comment"
                                    @click="comment = !comment"><svg class="w-8 h-8 text-gray-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                        </path>
                                    </svg></button>
                            </div>
                            <div class="flex space-x-2 items-center">
                                <button type="button" class="focus:outline-none Like"><svg
                                        class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
                                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                    </svg></button>
                            </div>
                        </div>
                        <div class="p-2 flex flex-col space-y-3">
                            <div class="w-full">
                                <p class="font-normal text-xs text-gray-500">{{ $thread->updated_at->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </x-container>
</x-app-layout>
