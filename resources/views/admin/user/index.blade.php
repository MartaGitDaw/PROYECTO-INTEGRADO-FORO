<x-admin-layout>
    <x-container>
        <nav class="text-blue-500 text-xs  mt-5 lg:mt-0">
            <a href="{{ route('admin.index') }}" class="hover:underline">Admin</a>
            >
            <span>Users</span>
        </nav>
        <div class="flex mx-auto rounded-md mt-3 lg:mb-4">
            <form name="buscar" action="{{ route('admin.user.index') }}" method="GET" class="flex w-full">
                <input name="name" type="search"
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
        </div>
        <x-table>
            <thead>
                <tr>
                    <x-th-table>Name</x-th-table>
                    <x-th-table>Roles</x-th-table>
                    <x-th-table>Actions</x-th-table>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <x-td-table>
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                    <img src="{{ asset('storage/' . $user->profile_photo_path) }}"
                                        alt="{{ Str::substr($user->name, 0, 1) }}"
                                        class="rounded-full h-10 w-10 flex items-center justify-center mr-3 border-2 border-blue-500">
                                </div>
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $user->name }}
                                    </p>

                                    <span class="hidden md:flex text-xs text-blue-600">{{ $user->email }}</span>
                                </div>
                            </div>
                        </x-td-table>
                        <x-td-table>
                            <p class="text-gray-900">
                                @role('admin')
                                    @foreach ($user->roles as $role)
                                        @if ($role->name == 'moderator')
                                            <form action="{{ route('admin.user.roles.remove', [$user->id, $role->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-gradient-to-r from-emerald-300 to-indigo-400 rounded-md p-1"
                                                    title="Remove">Moderator</button>
                                            </form>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach ($user->roles as $role)
                                        @if ($role->name == 'moderator')
                                            <button type="submit"
                                                class="bg-gradient-to-r from-emerald-300 to-indigo-400 rounded-md p-1"
                                                title="User Moderator">Moderator</button>
                                        @endif
                                    @endforeach
                                @endrole
                            </p>
                        </x-td-table>
                        <x-td-table>
                            <div class="flex justify-evenly">
                                <form action="{{ route('admin.user.roles.assign', $user->id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="rounded-md p-1 border bg-indigo-300"
                                        title="Make Moderator">M</button>
                                </form>
                                {{-- <form action="{{ route('admin.user.roles.assign', $user->id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit"
                                        class="rounded-md p-1 border bg-red-300" title="Ban">B</button>
                                </form> --}}
                            </div>
                        </x-td-table>
                    </tr>
                @endforeach
            </tbody>
        </x-table>
        <div class="mt-4 mb-4">
            {{ $users->links() }}
        </div>
    </x-container>
</x-admin-layout>
