<x-app-layout>
    <x-container>
        <nav class="text-blue-500 text-xs mt-5 lg:mt-0 mb-3">
            <a href="{{route('dashboard')}}" class="hover:underline">Dashboard</a>
            >
            <span>My Threads</span>
            /
            <span>{{$user->name}}</span>

        </nav>

            <div class="px-6 mt-20 mb-5">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full flex justify-center ">
                        <img src="{{ asset('storage/' . $user->profile_photo_path) }}"
                            class="shadow-xl rounded-full align-middle border-none -m-16 -ml-20 lg:-ml-16 max-w-[150px] min-w-[150px] min-h-[150px] bg-amber-400" />
                    </div>
                </div>
            </div>
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
                                <a href="{{route('threads.show', $thread)}}">
                                    {{ $thread->title }}
                                </a>
                            </x-td-table>
                            <x-td-table>{{ $thread->category->name }}</x-td-table>
                            <x-td-table>{{count($thread->likes())}}</x-td-table>
                            <x-td-table>
                                @php $cont=0; @endphp
                                @foreach($comments as $coment)
                                    @if($coment->thread_id == $thread->id)
                                        @php $cont++; @endphp
                                    @endif
                                @endforeach
                                {{$cont}}
                            </x-td-table>
                            <x-td-table>
                                <div class="inline-flex">
                                    <x-blue-button-link href="{{route('threads.edit', $thread->id)}}">
                                        Edit
                                    </x-blue-button-link>
                                    <form action="{{route('threads.destroy', $thread->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-dark-button>Delete</x-dark-button>
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
