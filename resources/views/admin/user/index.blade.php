<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container mx-auto px-4 sm:px-8">
                    <div class="py-8">
                        <div class="flex justify-between">
                            <h2 class="text-2xl font-semibold leading-tight">Users</h2>
                        </div>
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                User
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Role
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Actions
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Created at
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="px-3 py-2 border-b border-gray-200 bg-white text-sm">
                                                    <div class="flex items-center">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            @foreach ($user->roles as $role)
                                                                @if ($role->name == 'moderator')
                                                                    <button
                                                                        class="font-bold text-current text-orange-500">M</Button>
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        <div class="ml-3">
                                                            <p class="text-gray-900 whitespace-no-wrap text-xs">

                                                                {{ $user->name }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-3 py-2 border-b border-gray-200 bg-white text-sm">
                                                    <div class="flex items-center">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            @foreach ($user->roles as $role)
                                                                {{ $role->name }}
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                </td>
                                                </td>
                                                <td class="px-3 py-2 border-b border-gray-200 bg-white text-sm">
                                                    <div class="text-gray-900 whitespace-no-wrap">
                                                        <div>
                                                            {{-- @if($user->roles->name != 'moderator') --}}
                                                            <form action="{{ route('admin.user.roles.assign', $user->id) }}" method="POST">
                                                                @csrf
                                                                @method('POST')
                                                                    <button type="submit"
                                                                        class="hover:shadow-form rounded-md bg-[#6A64F1] px-3 py-1 text-base font-semibold text-white outline-none">
                                                                        Hacer
                                                                    </button>
                                                            </form>
                                                            {{-- @endif --}}
                                                        </div>
                                                        @role('admin')
                                                        <div>
                                                            {{-- mostrar permisos que tiene el rol --}}
                                                            @foreach ($user->roles as $role)
                                                                @if ($role->name == 'moderator')
                                                                    <form
                                                                        action="{{ route('admin.user.roles.remove', [$user->id, $role->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')

                                                                        <button type="submit"
                                                                            class="hover:shadow-form rounded-md bg-[#6A64F1] px-3 py-1 text-base font-semibold text-white outline-none">
                                                                            remove privileges
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        @endrole
                                                    </div>
                                                </td>

                                                <td class="px-3 py-2 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $user->created_at }}
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
