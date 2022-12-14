<x-app-layout>
    <div class=" px-4 sm:px-8 flex mt-12 lg:mt-4 w-full justify-center">
        <div class="overflow-hidden w-full mt-4 lg:mt-0">
            <nav class="text-blue-500 text-xs mt-5 lg:mt-0">
                <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
                >
                <a href="{{ route('categories') }}" class="hover:underline">Categories</a>
                >
                <span>{{ $category->name }}</span>
            </nav>
        </div>
    </div>
    <x-container>
        @foreach ($category->threads as $thread)
            <div class="mx-auto flex justify-center max-w-3xl md:mb-8 mt-4 bg-white rounded-lg items-center  md:p-0 p-8 shadow-2xl"
                x-data="{
                    comment: false,
                }">
                <div class="h-full w-full  m-3">
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
                                <span class="text-2xl ">{{ $thread->category->name }}</span>

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
                                <livewire:like-thread :thread="$thread" />
                                <a href="{{route('threads.show', $thread)}}" class="ml-4 text-sm text-gray-700 dark:text-gray-500">
                                    <i class="far fa-comment-dots"></i>
                                    <span class="text-xs font-bold text-gray-600">
                                        @php $cont=0; @endphp
                                        @foreach ($comments as $coment)
                                            @if ($coment->thread_id == $thread->id)
                                                @php $cont++; @endphp
                                            @endif
                                        @endforeach
                                        {{ $cont }}
                                    </span>
                                </a>
                            </div>
                            <div class="p-2 flex flex-col space-y-3">
                                <div class="w-full">
                                    <p class="font-normal text-xs text-gray-500">Posted:
                                        {{ $thread->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Comments -->
                        {{-- <div class="w-full">
                            <form action="{{ route('comentar') }}" method="POST">
                                @csrf
                                <input type="text" name="thread_id" value="{{ $thread->id }}" hidden>
                                <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                <textarea name="content" class="h-20 flex justify-between p-2 text-gray-700 bg-blue-200 rounded-md w-full"></textarea>
                                @error('content')
                                    <p class="text-sm text-red-700">*** {{ $message }}</p>
                                @enderror
                                <button type="submit" class="hover:text-blue-500">Comment</button>
                            </form>
                        </div> --}}
                        <div class="w-full">
                            @foreach ($comments as $comment)
                                @if ($comment->thread_id == $thread->id)
                                    <div class="mt-2 bg-gray-300 shadow-md rounded-md p-3">
                                        <div class="flex">
                                            <img src="{{ asset('storage/' . $comment->user->profile_photo_path) }}"
                                                alt="{{ Str::substr($comment->user->name, 0, 1) }}"
                                                class="rounded-full h-10 w-10 flex items-center justify-center mr-3 border-2 border-blue-500">
                                            <span class="text-blue-500 block">{{ $comment->user->name }}</span>
                                            {{-- <textarea class="h-20 flex justify-between p-2 text-gray-700 w-full display-1">{{ $comment->content }}</textarea> --}}
                                        </div>
                                        <span>{{ $comment->content }}</span>
                                        {{-- @if ($comment->user_id == Auth::user()->id)
                                            <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-white hover:bg-slate-600 self-end bg-slate-500 rounded-md  p-1 m-1">Delete</button>
                                            </form>
                                        @endif --}}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </x-container>

</x-app-layout>
