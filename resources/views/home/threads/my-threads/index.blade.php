<x-app-layout>
    <x-container>
        <nav class="text-blue-500 text-xs mt-5 lg:mt-0 mb-3">
            <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
            >
            <span>My Threads</span>
            /
            <span>{{ $user->name }}</span>

        </nav>
        <div class="px-6 mt-20 mb-5">
            <div class="flex flex-wrap justify-center">
                <div class="w-full flex justify-center ">
                    <img src="{{ asset('storage/' . $user->profile_photo_path) }}"
                        class="shadow-xl rounded-full align-middle border-none -m-16 -ml-20 lg:-ml-16 max-w-[150px] min-w-[150px] min-h-[150px] bg-amber-400" />
                </div>
            </div>
        </div>
        {{-- <div class="flex mx-auto rounded-md mt-3 lg:mb-4">
                <form name="buscar" action="{{ route('threads.mythreads', $user) }}" method="GET" class="flex w-full">
                    <input name="title" type="search"
                        class="p-2 rounded border-2 border-slate-200 focus:border-blue-500 focus:outline-none"
                        placeholder="search...">
                    <button type="submit">
                        <div class="flex bg-slate-200 items-center p-2 rounded border-2 hover:bg-slate-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </form>
            </div> --}}
        <div class="flex place-content-end mb-2">
            <x-dark-button-link href="{{ route('threads.create') }}">New</x-dark-button-link>
        </div>
        <x-table>
            <thead>
                <x-th-table>Title</x-th-table>
                <x-th-table>Category</x-th-table>
                <x-th-table>Likes</x-th-table>
                <x-th-table>Comments</x-th-table>
                <x-th-table>Actions</x-th-table>
            </thead>
            <tbody>
                @foreach ($threads as $thread)
                    <tr>
                        <x-td-table>
                            <a href="{{ route('threads.show', $thread) }}">
                                {{ $thread->title }}
                            </a>
                        </x-td-table>
                        <x-td-table>{{ $thread->category->name }}</x-td-table>
                        <x-td-table>{{ count($thread->likes()) }}</x-td-table>
                        <x-td-table>
                            @php $cont=0; @endphp
                            @foreach ($comments as $coment)
                                @if ($coment->thread_id == $thread->id)
                                    @php $cont++; @endphp
                                @endif
                            @endforeach
                            {{ $cont }}
                        </x-td-table>
                        <x-td-table>
                            <div class="inline-flex">
                                <a href="{{ route('threads.edit', $thread->id) }}"
                                    class="text-gray-500 hover:text-blue-500 mx-5" title="Edit">
                                    <i class="far fa-edit"> </i>
                                </a>
                                <form action="{{ route('threads.destroy', $thread->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-500 hover:text-red-500 mx-5" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>

                            </div>
                        </x-td-table>
                    </tr>
                @endforeach
            </tbody>
        </x-table>
        <div class="mt-4 mb-4">
            {{ $threads->links() }}
        </div>
    </x-container>
</x-app-layout>
