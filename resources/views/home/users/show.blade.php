<x-app-layout>
    <x-container>
        <nav class="text-blue-500 text-xs mt-5 lg:mt-0">
            <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
            >
            <a href="{{ route('users') }}" class="hover:underline">Users</a>
            >
            <span>{{ $user->name }}</span>
        </nav>
        <!-- component -->
        <div
            class="max-w-md mx-auto md:max-w-2xl mt-20 min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-xl">
            <div class="px-6">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full flex justify-center ">
                        <img src="{{ asset('storage/' . $user->profile_photo_path) }}"
                            class="shadow-xl rounded-full align-middle border-none -m-16 -ml-20 lg:-ml-16 max-w-[150px] min-w-[150px] min-h-[150px] bg-amber-400" />
                    </div>
                    <div class="w-full text-center mt-20">
                        <div class="flex justify-center lg:pt-4 pt-8 pb-0">
                            <div class="p-3 text-center">
                                <span
                                    class="text-xl font-bold block uppercase tracking-wide text-slate-700">
                                    {{$user->threads->count()}}
                                </span>
                                <a href="{{ route('threads.user', $user) }}" class="text-sm text-slate-400">Threads</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-2">
                    <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">{{$user->name}}</h3>
                    @foreach ($user->roles as $role)
                        @if ($role->name == 'moderator')
                        <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                            MODERATOR
                        </div>
                        @endif
                    @endforeach
                </div>
                <div class="mt-6 py-6 border-t border-slate-200 text-center">
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full px-4">
                            <p class="font-light leading-relaxed text-slate-600 mb-4">
                                {{$user->bio}}
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-container>
</x-app-layout>
