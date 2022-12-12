<x-app-layout>
    <div class=" px-4 sm:px-8 flex mt-12 lg:mt-4 w-full justify-center">
        <div class="overflow-hidden w-full mt-4 lg:mt-0">
            <nav class="text-blue-500 text-xs mt-5 lg:mt-0">
                <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
                >
                <a href="{{ route('users') }}" class="hover:underline">Thread</a>
                >
                <span>{{ $thread->title }}</span>
            </nav>
        </div>
    </div>
    {{-- <div class="mx-auto flex justify-center items-center filter blur-2xl animate-pulse duration-500 transition w-full">
        <div class="mt-20 mr-10 flex relative">
            <div class="p-44 rounded-full bg-gradient-to-r to-indigo-700 from-pink-900 absolute top-20 right-0">

            </div>
            <div class="p-44 rounded-full bg-gradient-to-r to-pink-700 from-indigo-900 absolute md:flex hidden">

            </div>
        </div>
        <!-- Right Side -->
        <div class="flex flex-col absolute top-8 right-10 space-y-4">

            <div
                class="p-5 rounded-full bg-gradient-to-r to-pink-700 via-red-500 from-indigo-900 absolute right-16 top-10">

            </div>
        </div>
        <div class="flex flex-col absolute bottom-8 right-10 space-y-4">

            <div class="p-10 rounded-full bg-gradient-to-r to-pink-700 from-indigo-900 absolute right-16 bottom-10">

            </div>
        </div>
        <!--  Left side -->
        <div class="flex flex-col space-y-4 filter animate-pulse duration-500">
            <div class="p-10 bg-gradient-to-r to-indigo-700 from-blue-900 absolute top-20 left-20">

            </div>
            <div class="p-10 bg-gradient-to-r to-indigo-700 from-blue-900 absolute bottom-20 right-20">

            </div>
        </div>
    </div> --}}
    <x-container>
        <div class="mx-auto flex justify-center max-w-3xl md:mb-8 mt-4 bg-white rounded-lg items-center relative md:p-0 p-8 shadow-2xl"
            x-data="{
                comment: false,
            }">

            <div class="h-full relative m-3">
                <div class="py-2 px-2">
                    <div class="flex justify-between items-center py-2">
                        <div class="relative mt-1 flex">
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
                                    <button class="text-indigo-500 text-sm capitalize flex justify-start items-start">•
                                        follow</button>
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
                <div>
                    <h2 class="text-2xl bold text-blue-500">{{ $thread->title }}</h2>
                </div>
                @if (isset($thread->image))
                    <div class="relative w-full h-full">
                        <img src="{{ asset('storage/' . $thread->image) }}" alt="saman"
                            class="rounded-lg w-full h-full object-cover">
                    </div>
                @endif
                <div>
                    {{ $thread->description }}
                </div>
                <div class="">

                    {{-- <!-- Comment -->
                    <div class="overflow-y-scroll w-full absolute inset-0 bg-white transform transition duration-200"
                        x-show="comment" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-90">
                        <div class="flex justify-start items-center py-2 px-4 border-b" @click="comment = !comment">
                            <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                            </svg>
                        </div>
                        <div class="p-2 mb-10">
                            <!-- System Comment -->
                            <div
                                class="flex justify-start flex-col space-y-3 items-start px-2 border-b border-gray-100">
                                <div class="relative mt-1 mb-3 pt-2 flex">
                                    <div class="mr-2">
                                        <img src="https://avatars.githubusercontent.com/u/68494287?v=4"
                                            alt="saman sayyar" class="w-8 h-8 rounded-full object-cover">
                                    </div>
                                    <div class="ml-2 w-full" x-data="{ replies: false }">
                                        <p class="text-gray-600 md:text-sm text-xs w-full">
                                            <!-- Username User -->
                                            <span class="font-normal text-gray-900">samansayyar</span>
                                            <!-- Username User -->
                                            You Can see?
                                        </p>
                                        <div class="flex space-x-4">
                                            <div class="time mt-1 text-gray-400 text-xs">
                                                <p>2d</p>
                                            </div>
                                            <button type="button"
                                                class="focus:outline-none time mt-1 text-gray-400 text-xs">
                                                <p>replay</p>
                                            </button>
                                        </div>
                                        <button type="button" @click="replies = !replies"
                                            class="focus:outline-none  mt-3 flex justify-center items-center">
                                            <p class="text-xs text-center text-indigo-500 flex space-x-2">
                                                <span>____ View replies (1)</span> <svg class="w-3 h-4" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </p>
                                        </button>
                                        <div x-show="replies" x-transition
                                            class="flex justify-start flex-col space-y-3 items-start px-2 border-b border-gray-100">
                                            <div class="relative mt-1 mb-3 pt-2 flex">
                                                <div class="mr-2">
                                                    <img src="https://avatars.githubusercontent.com/u/68494287?v=4"
                                                        alt="saman sayyar" class="w-8 h-8 rounded-full object-cover">
                                                </div>
                                                <div class="ml-2 w-full" x-data="{ replies: true }">
                                                    <p class="text-gray-600 md:text-sm text-xs w-full">
                                                        <!-- Username User -->
                                                        <span class="font-normal text-gray-900">samansayyar</span>
                                                        <!-- Username User -->
                                                        You Can see?
                                                    </p>
                                                    <div class="flex space-x-4">
                                                        <div class="time mt-1 text-gray-400 text-xs">
                                                            <p>2d</p>
                                                        </div>
                                                        <button type="button"
                                                            class="focus:outline-none time mt-1 text-gray-400 text-xs">
                                                            <p>replay</p>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="flex justify-start flex-col space-y-3 items-start px-2 border-b border-gray-100">
                                <div class="relative mt-1 mb-3 pt-2 flex">
                                    <div class="mr-2">
                                        <img src="https://avatars.githubusercontent.com/u/68494287?v=4"
                                            alt="saman sayyar" class="w-8 h-8 rounded-full object-cover">
                                    </div>
                                    <div class="ml-2 w-full">
                                        <p class="text-gray-600 md:text-sm text-xs w-full">
                                            <!-- Username User -->
                                            <span class="font-normal text-gray-900">samansayyar</span>
                                            <!-- Username User -->
                                            You Can see?
                                        </p>
                                        <div class="time mt-1 text-gray-400 text-xs">
                                            <p>2d</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- System Like and tools Feed -->
                    <div class="flex justify-between items-start p-2 py-">
                        <div class="flex space-x-2 items-center">
                            <button type="button" class="focus:outline-none Like"><svg class="w-8 h-8 text-gray-600"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                    </path>
                                </svg></button>
                            <button type="button" class="focus:outline-none Comment" @click="comment = !comment"><svg
                                    class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg></button>

                        </div>
                        <div class="flex space-x-2 items-center">
                            <button type="button" class="focus:outline-none Like"><svg class="w-8 h-8 text-gray-600"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
                                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                </svg></button>
                        </div>
                    </div>
                    <div class="p-2 flex flex-col space-y-3">
                        <div class="w-full">
                            <p class="font-bold text-sm text-gray-700">234 likes</p>
                        </div>
                        <div class="w-full">
                            <p class="font-normal text-xs text-gray-500">{{ $thread->updated_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                    <!-- End System Like and tools Feed -->
                    {{-- <div class="z-50">
                        <form>
                            <div class="flex justify-between border-t items-center w-full"
                                :class="comment ? 'absolute bottom-0' : ''">
                                <div class="w-full ">
                                    <input type="text" name="comment" id="comment" placeholder="Add A Comment..."
                                        class="w-full text-sm py-4 px-3 rounded-none focus:outline-none">
                                </div>
                                <div class="w-20">
                                    <button
                                        class="border-none text-sm px-4 bg-white py-4 text-indigo-600 focus:outline-none">Post</button>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>