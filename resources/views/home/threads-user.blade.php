<x-app-layout>
    <x-container>
        <nav class="text-blue-500 text-xs mt-5 lg:mt-0 mb-3">
            <a href="{{route('dashboard')}}" class="hover:underline">Dashboard</a>
            >
            <a href="{{route('users')}}" class="hover:underline">Users</a>
            >
            <span>{{$user->name}}</span>
            /
            <span>Threads</span>
        </nav>
            <div class="px-6 my-20">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full flex justify-center ">
                        <img src="{{ asset('storage/' . $user->profile_photo_path) }}"
                            class="shadow-xl rounded-full align-middle border-none -m-16 -ml-20 lg:-ml-16 max-w-[150px] min-w-[150px] min-h-[150px] bg-amber-400" />
                    </div>
                </div>
            </div>
        <x-table>
            <thead>
                <x-th-table>Title</x-th-table>
                <x-th-table>Category</x-th-table>
                <x-th-table>Likes</x-th-table>
                <x-th-table>Comments</x-th-table>
            </thead>
            <tbody>
                @foreach ($threads as $thread)
                    @if ($thread->user_id == $user->id)
                        <tr>
                            <x-td-table>
                                <a href="{{route('threads.show', $thread)}}">
                                    {{ $thread->title }}
                                </a>
                            </x-td-table>
                            <x-td-table>{{ $thread->category->name }}</x-td-table>
                            <x-td-table>
                                {{ count($thread->likes()) }}
                            </x-td-table>
                            <x-td-table>
                                @php $cont=0; @endphp
                                @foreach($comments as $coment)
                                    @if($coment->thread_id == $thread->id)
                                        @php $cont++; @endphp
                                    @endif
                                @endforeach
                                {{$cont}}
                            </x-td-table>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </x-table>
        <div class="mt-4 mb-4">
            {{ $threads->links() }}
        </div>
    </x-container>
</x-app-layout>
